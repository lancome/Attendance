<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
//    private $filename;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function decodePDF()
    {
        $parser = new \Smalot\PdfParser\Parser();
        $data = array();
        $pdf    = $parser->parseFile('nimekiri_test.pdf');
        $text = $pdf->getText();
        $text=str_replace(array(" – ",
            " - ",
            "Seisuga",
            "Jrk",
            "Kood",
            "*",
            "TREV",
            "REV OK",
            "OK",
            "REV"
        ),"",$text);
        $text=preg_replace('/[(][A-z]+[)] /',"",$text);
        $text=str_replace("õ","o",$text);
        $text=str_replace("ö","o",$text);
        $text=str_replace("ü","u",$text);
        $text=str_replace("Š","S",$text);
        $text=str_replace("š","s",$text);
        $text=str_replace("ä","a",$text);
        $text=str_replace(".","",$text);
        $text=str_replace(array("  ", " ")," ",$text);
        preg_match_all('/RD[BRDIP]R[\d][\d]/', $text, $match0);
//        preg_match_all('/[\d][\d][\d][\d][\d][\d]/', $text, $match3);
//        preg_match_all('/[A-Z][a-z]+ [A-Z][a-z]+/', $text, $match2);
        preg_match_all('/[0-9]+ [A-z]+ [A-z]+ [0-9]+/', $text, $match1);
        for($i=0;$i<count($match0[0]);$i++) {
          if (!DB::table('groups')->where('code', '=', $match0[0][$i])->first()) {
                  DB::table('groups')->insert(
                    array(
                        'code' => $match0[0][$i],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    )
                );
            }
        }
        $j=-1;
        for($i=0;$i<count($match1[0]);$i++) {
            $reg = explode(" ", $match1[0][$i]);
            if(intval($reg[0])==1)
            {
                $j++;
            }
            array_push($data, array($reg[1], $reg[2], $reg[3], $match0[0][$j]));
            if (!DB::table('students')->where('student_code', '=', $data[$i][2])->first()) {
                DB::table('students')->insert(
                    array('name' => $data[$i][0],
                        'lastname' => $data[$i][1],
                        'student_code' => $data[$i][2],
                        'group_code' => Group::where('code', '=', $match0[0][$j])->firstOrFail()->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    )
                );
            }
        }
        return redirect('students');
    }
}
