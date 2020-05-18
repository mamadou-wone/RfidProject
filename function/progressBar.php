<?php

function ProgressBar(int $percent)
{
    if ($percent < 40) {
        echo "progress-bar bg-danger";
    }elseif ($percent >= 40 && $percent < 60) {
        echo "progress-bar bg-warning";    
    }elseif ($percent >= 60 && $percent < 80) {
        echo "progress-bar";
    }elseif ($percent >= 80 && $percent < 100) {
        echo "progress-bar bg-info";
    }elseif ($percent >= 100) {
        echo "progress-bar bg-success";
    }
}