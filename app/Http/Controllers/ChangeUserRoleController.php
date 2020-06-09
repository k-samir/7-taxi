<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeUserRoleController extends Controller
{


    public function changeRole(Request $request, int $idToModify): JsonResponse
    {
        $attributes = $this->__roleModificationAttributes($request, $idToModify);
        return
            response()->json([$attributes['isValid'] ? 'success' : 'error' => [
                'message' => $attributes['message'],
                "type" => $attributes['type'],
            ]]);
    }

    private function __roleModificationAttributes(Request $request, int $idToModify): array
    {
        $isValid = false;
        $typeThrown = 'error';

        $currentRole = User::all()->firstWhere('id', Auth::id())->role;

        switch ($currentRole) {
            case 'admin':
                $roleOnRequest = $request->get("role-$idToModify", 'none');
                switch ($roleOnRequest) {
                    case 'admin':
                    case 'client':
                    case 'conductor':
                        $userToModify = User::all()->firstWhere('id', $idToModify);
                        if ($userToModify->role == $roleOnRequest) {
                            $typeThrown = 'warning';
                            $message = "Le rôle sélectionné est le même que celui de l'utilisateur!";
                        } else {
                            $isValid = true;
                            $typeThrown = "success";
                            $userToModify->update(['role' => $roleOnRequest]);
                            $message = "Le rôle de l'utilisateur a été changé à \"$roleOnRequest\"!";
                        }
                        break;
                    case'none':
                    default:
                        $message = "Le rôle sélectionné n'est pas valide!";
                }
                break;
            case 'client':
            case 'conductor':
                $message = "Votre rôle demande une élévation! Demander à un administrateur de changer votre rôle.";
                break;
            case 'none':
                $message = "Vous ne pouvez pas modifier le rôle courrant. Vous devez avoir un rôle pour le faire.";
                break;
            default:
                $message = "Le rôle obtenu n'est pas valide. Veuillez obtenir un rôle valide avant de modifer";
                break;
        }

        return [
            'isValid' => $isValid,
            'type' => $typeThrown,
            'message' => $message,
        ];
    }

}
