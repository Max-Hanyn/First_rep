<?php

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->isLoggedOut();

    }

    public function index($id)
    {

        $profileModel = new UserProfileModel();
        $profileData = $profileModel->getProfile($id);
        $roleModel = new RolesModel();
        $role = $roleModel->getUserRole($id);
        $checkUser = new AuthService();
        $checkUser->checkUserProfile($id);
        $userPhotoModel = new UsersPhotoModel();
        $photos = $userPhotoModel->getUserPhotos($id);

        $config = parse_ini_file("./config/photos.ini");
        $path = $config['Path'];

        $avatarPhoto = $userPhotoModel->getUserAvatar($id);

        return $this->view('profile', ['pageData' => $profileData, 'avatar' => $avatarPhoto, 'path' => [$path]]);
    }

    public function logout()
    {

        $_SESSION['user'] = [];
        Route::redirect('login');
    }


    public function skills($id)
    {
        $userSkills = new UserSkillsModel();
        $skills = $userSkills->getUserSkills($id);


        return $this->view('profileSkills', ['skills' => [$skills], 'id' => [$id]]);

    }

    public function add()
    {

        $userPhotoModel = new UsersPhotoModel();
        $avatarExists = $userPhotoModel->checkUserAvatar($_SESSION['user']['id']);

        if ($avatarExists) {

            $photo = PhotoUpload::uploadPhoto();

            $userPhotoModel->addPhoto($photo, $_SESSION['user']['id'], '1');
            exit();

        } else {

            $currentUserAvatar = $userPhotoModel->getUserAvatar($_SESSION['user']['id']);
            PhotoUpload::deletePhoto($currentUserAvatar[0]['photo_name']);
            $photo = PhotoUpload::uploadPhoto();
            $userPhotoModel->changeAvatar($photo, $_SESSION['user']['id']);

        }

    }

    public function change($id)
    {

        $userProfileModel = new UserProfileModel();
        $profileData = $_POST;
        $userProfileModel->changeProfileData($id, $profileData);


    }

}