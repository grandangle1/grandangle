<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 24/02/2018
 * Time: 20:15
 */
namespace App\service;

use App\Utils;
use Core\Auth\Session;
use \DateTime;

class Calendar {


    public static function createCalendar($month, $year) {
        $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
        $startOffset = date('w',mktime(0,0,0,$month,1,$year));

        $gendate = new DateTime($year.'-'.$month.'-1');
        $startWeek = $gendate->Format("Y-W");
        $gendate = new DateTime($year.'-'.$month.'-'.$days_in_month);
        $endWeek = $gendate->Format("Y-W");
        $gendate = new DateTime();
        $now = intval($gendate->format('d'));
        $nowYearMonth = new DateTime();
        $nowYearMonth = $nowYearMonth->format('Y-m');
        intval($month) < 10 ? $month2 = "0".$month : $month2 = $month;
        $currentYearMonth = implode("-", [$year, $month]);


        $currentLanguage = Utils::getLangue();

        $expos = Utils::getTable('Exposition')->query("
            SELECT idExpo, week, theme".ucfirst($currentLanguage)." AS theme 
            FROM exposition WHERE week >= ? AND week <= ?",
            [$startWeek, $endWeek]);

        //------------------------------ recup artists name
        foreach ($expos as $expo) {
            $ids[] = $expo->idExpo;
            $conditions[] = "participation.idExpo = ?";
        }

        empty($conditions) ? false : $conditions = implode( "OR ", $conditions);
        empty($conditions) ? false : count($ids) > 0 ? $artists = Utils::getTable('Artist')->query("
        SELECT participation.id, artist.idArtist, artist.surnameArtist, artist.nameArtist, participation.idExpo
        FROM participation, artist
        WHERE $conditions AND artist.idArtist = participation.idArtist"
            , $ids) : false;

        //----------------------------- put all infos in an ordered array (name, surname, theme)
        $parts = explode("-", $startWeek);
        $startWeek = intval($parts[1]);
        $parts = explode("-", $endWeek);
        $endWeek = intval($parts[1]);


        for($week = $startWeek; $week <= $endWeek; $week++) {
            $existences[$week] = "";
            foreach ($expos as $expo) {
                $parts = explode("-", $expo->week);
                if(intval($parts[1]) == $week) {
                    foreach ($artists as $artist) {
                        if($artist->idExpo == $expo->idExpo){
                            $existences[$week][] = ["theme" => $expo->theme, "name" => $artist->nameArtist, "surname" => $artist->surnameArtist,
                                "idExpo" => $expo->idExpo, "idArtist" => $artist->idArtist, "week" => $expo->week];
                        }
                    }
                }
            }
        }


        $dayFr = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
        $dayEn = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];

        $days = "<th></th>";
        if($currentLanguage == "en") {
            foreach ($dayEn as $day) {
                $days .= "<th>$day</th>";
            }
        } else {
            foreach ($dayFr as $day) {
                $days .= "<th>$day</th>";
            }
        }

        //create the 7 days header
        $calendar = '<table class="calendar"><thead>'.$days.'</thead><tr class="week-row';


        if(!empty($existences[$startWeek])) {
            $calendar .= ' expo"><td class="week"><p>Semaine '.$startWeek.'</p><small>Artistes</small>';
            foreach ($existences[$startWeek] as $artist) {
                $calendar .= '<p><a href="?p=guest.artist&id='.$artist["idArtist"].'" class="badge badge-dark"><span class="name">'.$artist["name"].' </span><span class="name">'.$artist["surname"].'</span></a></p>';
            }
            $calendar .= '<p><small>Exposition</small><br><a href="?p=guest.today&w='.$existences[$startWeek][0]["week"].'" class="badge badge-secondary">'.$existences[$startWeek][0]["theme"].'</a></p>';
        } else {
            $calendar .= '"><td class="week">Semaine '.$startWeek.'</td>';
        }


        //offset days begining
        for ($i = 0; $i < $startOffset; $i++) {
            $calendar .='<td class="impossible"></td>';
        }

        $currentDay = 0;
        for($a = $startOffset; $a < 7; $a++) {
            $currentDay++;
            $calendar .= '<td class="ok">'.$currentDay.'</td>';
        }
        $calendar .= "</tr>";
        //end line including offsets


        $dayOfWeek = 6;
        while ($currentDay < $days_in_month) {
            $dayOfWeek++;
            $currentDay++;

            if($dayOfWeek % 7 == 0) {
                $dayOfWeek = 0;
                $startWeek++;
                $calendar .= '</tr><tr class="week-row';

                //if there is an expo
                if(!empty($existences[$startWeek])) {
                    $calendar .= ' expo"><td class="week"><p>Semaine '.$startWeek.'</p><small>Artiste(s)</small>';
                    foreach ($existences[$startWeek] as $artist) {
                        $calendar .= '<p><a href="?p=guest.artist&id='.$artist["idArtist"].'" class="badge badge-dark"><span class="name">'.$artist["name"].' </span><span class="name">'.$artist["surname"].'</span></a></p>';
                    }
                    $calendar .= '<p><small>Exposition</small><br><a href="?p=guest.today&w='.$existences[$startWeek][0]["week"].'" class="badge badge-secondary">'.$existences[$startWeek][0]["theme"].'</a></p>';

                } else {
                    $calendar .= ' empty"><td class="week"><p>Semaine '.$startWeek.'</p>';
                }

                $calendar .='</td>';
            }

            $currentDay == $now && $currentYearMonth == $nowYearMonth ? $calendar .= '<td class="today">'.$currentDay.'</td>' : $calendar .= '<td>'.$currentDay.'</td>';

        }

        //finish calendar with empty cells
        for($u = $dayOfWeek; $u < 6; $u++) {
            $calendar .= '<td class="impossible"></td>';
        }

        //create year-month for pagination
        $month = intval($month);
        $year = intval($year);

        if($month + 1 <= 12) {
            $nextMonth = [$year, $month + 1];
        } else {
            $nextMonth = [$year + 1, 1];

        }
        if ($month - 1 >= 1 ) {
            $prevMonth = [$year, $month - 1];
        } else {
            echo "ok";
            $prevMonth = [$year - 1, 12];
        }

        $nextMonth = implode("-", $nextMonth);
        $prevMonth = implode("-", $prevMonth);

        $calendar .= '</tr><tr><td class="changeMonth" colspan="8"><div class="prev"><a href="?p=guest.planning&m='.$prevMonth.'"><img src="img/calendar/back.svg" height="30px" style="float: left;"></a></div><div class="next">
            <a href="?p=guest.planning&m='.$nextMonth.'"><img src="img/calendar/next.svg" height="30px" style="float: right;"></a></div></td></tr>';

        $calendar .= "</table>";
        return $calendar;
    }

}