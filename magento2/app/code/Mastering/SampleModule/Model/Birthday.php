<?php


namespace Mastering\SampleModule\Model;


class Birthday
{
    /**
     * @param $date
     * @return bool
     */
    public function isYourBirthday($date)
    {
        $today = date('d-m-Y');
        $date = date('d-m-Y', strtotime($date));

        if($date == $today) {
            return true;
        }

        return false;
    }
}
