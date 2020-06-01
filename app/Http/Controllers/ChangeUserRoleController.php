<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeUserRoleController extends Controller
{


    public function changeRole(Request $request, int $idToModify): JsonResponse
    {
        dd($request);
        $userToModify = User::all()->where('id', $idToModify);
        $canModifyRoleArray = $this->roleModificationAttributes($this->getUserRole($userToModify));
        if (!$canModifyRoleArray['canModify'])
            return response()->json(['error',
                'message' => $canModifyRoleArray['message'],
                'type' => $canModifyRoleArray['type'],
            ]);

        return response()->json(['success',
            'message' => $canModifyRoleArray['message'],
            'roleFromRequest' => $request->get('role-' . $idToModify),
        ]);

    }

    /**
     * @param $idOrUser
     * @return int|Collection
     */
    private function getUserRole($idOrUser)
    {
        return ($idOrUser instanceof Collection) ?
            $idOrUser->first()->get('role', 'none') :
            $this->getUserRole(User::all()->where('id', $idOrUser));
    }


    private function roleModificationAttributes(string $role): array
    {
        $canModify = false;

        $currentRole = $this->getUserRole(Auth::id());
        $typeThrown = "";
        $message = "";

        if ($currentRole == $role) {
            $typeThrown = 'warning';
            $message = "Le rôle de l'utilisateur est déjà celui sélectionné!";
        } else
            switch ($role) {
                case 'admin':
                    $canModify = true;
                    $message = "Le rôle de l'utilisateur a été changé!";
                    break;
                case 'client':
                case 'conductor':
                    $canModify = $role == $this->getUserRole(Auth::id());
                    if ($canModify)
                        $message = "Le rôle de l'utilisateur a été changé!";
                    else {
                        $message = "Vous devez être du même rôle pour pouvoir le faire.";
                        $typeThrown = "error";
                    }
                    break;
                case 'none':
                    $typeThrown = 'error';
                    $message = "Vous ne pouvez pas modifier le rôle courrant. Vous devez avoir un rôle pour le faire.";
                    break;
                default:
                    $typeThrown = 'error';
                    $message = "Le rôle obtenu n'est pas valide. Veuillez obtenir un rôle valide avant de modifer";
                    break;
            }

        return [
            'canModify' => $canModify,
            'type' => $typeThrown,
            'message' => $message,
        ];
    }
}
