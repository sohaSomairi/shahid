<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class forqanshahid
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function check(User $user, $roleId) {
        foreach ($user->usergroup->roles()->where("roles_id",$roleId)->get() as $role) {
            if ($role) {
                return true;
            }
        }
        return false;
    }

    public function addUser(User $user) {
        return $this->check($user, 4);
    }
    public function editUser(User $user) {
        return $this->check($user, 5);
    }
    public function deletUser(User $user) {
        return $this->check($user, 6);
    }
    public function addYear(User $user) {
        return $this->check($user, 7);
    }
    public function editYear(User $user) {
        return $this->check($user, 8);
    }
    public function deletYear(User $user) {
        return $this->check($user, 9);
    }
    public function addSection(User $user) {
        return $this->check($user, 1);
    }
    public function editSection(User $user) {
        return $this->check($user, 2);
    }
    public function deletSection(User $user) {
        return $this->check($user, 3);
    }
    public function addFiletype(User $user) {
        return $this->check($user, 10);
    }
    public function editFiletype(User $user) {
        return $this->check($user, 11);
    }
    public function deletFiletype(User $user) {
        return $this->check($user, 12);
    }
    public function addTopic(User $user) {
        return $this->check($user, 13);
    }
    public function editTopic(User $user) {
        return $this->check($user, 14);
    }
    public function deletTopic(User $user) {
        return $this->check($user, 15);
    }
    public function addTopicFile(User $user) {
        return $this->check($user, 16);
    }
    public function addTitle(User $user) {
        return $this->check($user, 17);
    }
    public function editTitle(User $user) {
        return $this->check($user, 18);
    }
    public function deletTitle(User $user) {
        return $this->check($user, 19);
    }
    public function addTitleFiles(User $user) {
        return $this->check($user, 20);
    }
    public function editTitleFile(User $user) {
        return $this->check($user, 21);
    }
    public function deletTitleFile(User $user) {
        return $this->check($user, 22);
    }
    public function addSlide(User $user) {
        return $this->check($user, 23);
    }
    public function editSlide(User $user) {
        return $this->check($user, 24);
    }
    public function editSlideImg(User $user) {
        return $this->check($user, 25);
    }
    public function deletSlide(User $user) {
        return $this->check($user,26);
    }
    public function addUserGroup(User $user) {
        return $this->check($user, 27);
    }
    public function editUserGroup(User $user) {
        return $this->check($user, 28);
    }
    public function deletUserGroup(User $user) {
        return $this->check($user,29);
    }
    public function publishing(User $user) {
        return $this->check($user,30);
    }
    public function initiate(User $user) {
        return $this->check($user,31);
    }
    public function management(User $user) {
        return $this->check($user,32);
    }
    public function initiateYears(User $user) {
        return $this->check($user,33);
    }
    public function initiateSections(User $user) {
        return $this->check($user,34);
    }
    public function initiateFiletypes(User $user) {
        return $this->check($user,35);
    }
    public function publishingTopics(User $user) {
        return $this->check($user,36);
    }
    public function publishingTitles(User $user) {
        return $this->check($user,37);
    }
    public function publishingSlider(User $user) {
        return $this->check($user,38);
    }
    public function managementUsers(User $user) {
        return $this->check($user,39);
    }
    public function managementGroups(User $user) {
        return $this->check($user,40);
    }
}
