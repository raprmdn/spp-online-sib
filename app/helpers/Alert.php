<?php

class Alert
{
    public static function notify(): void
    {
       if (isset($_SESSION['alert'])) {
           echo '<div class="alert alert-' . $_SESSION['alert']['type'] . ' alert-dismissible fade show" role="alert">
                    <i class="' . $_SESSION['alert']['icon'] . ' mr-2"></i>
                    ' . $_SESSION['alert']['message'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
           unset($_SESSION['alert']);
       }
    }
}