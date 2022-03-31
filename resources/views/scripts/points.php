<?php
        function calcPoints($grade){
            $points = 0;
            switch ($grade) {
                case 'A*A*':
                    $points = 16;
                    break;
                case 'AA':
                    $points = 16;
                    break;
                case 'BB':
                    $points = 14;
                    break;
                case 'CC':
                    $points = 12;
                    break;
                case 'DD':
                    $points = 10;
                    break;
                case 'EE':
                    $points = 8;
                    break;
                case 'FF':
                    $points = 6;
                    break;
                case 'A*':
                    $points = 8;
                    break;
                case 'A':
                    $points = 8;
                    break;
                case 'B':
                    $points = 7;
                    break;
                case 'C':
                    $points = 6;
                    break;
                case 'D':
                    $points = 5;
                    break;
                case 'E':
                    $points = 4;
                    break;
                case 'F':
                    $points = 3;
                    break;
                default:
                    $points = 0;
                    break;
            }
            return $points;
        }

        
        function calcgrade($points){
        $grade ='A';
        switch ($points) {
            case 8:
                $grade = 'A';
                break;
            case 7:
                $grade = 'B';
                break;
            case 6:
                $grade = 'C';
                break;
            case 5:
                $grade =  'D';
                break;
            case 4:
                $grade = 'E';
                break;
            case 3:
                $grade = 'F';
                break;
            default:
                $grade = 'F';
                break;
        }
        return $grade;
    }
