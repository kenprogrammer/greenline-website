<?php
	namespace App\Traits;

	use App\Models\User;

	trait Users {

		/**
         * Check if username exists
         */
        public function usernameExists($username): bool
        {
            $flag=false;

            $res=User::where('username',$username)->count();

            if($res>0){
                $flag=true;
            }

            return $flag;
        }

        /**
        * Username belongs to user
        */
        public function usernameBelongsToUser($username,$id)
        {
            $flag=false;

            $email=User::where('username',$username)->where('id',$id)->count();

            if($email>0){
                $flag=true;
            }

            return $flag;
        }
	}