<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Student;
use App\Subject;
use App\User;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function decodeExcel()
    {
        Excel::load('Koormused_test.xls', function ($reader) {
            $results = $reader->toObject();

//            $g_arr = array();
//            foreach ($results as $item) {
////                array_push($g_arr, preg_split('/ /', $item['ruehm']));
//                array_push($g_arr,$item['ruehm']);
//            }
////            $groups = array_filter(array_collapse($g_arr));
//
//            dd($g_arr);
//            dd($results);
            
//users(teachers)
            foreach ($results as $item) {
                if (!DB::table('users')
                    ->where('email', '=', $item['oppejoud'] . '@gmail.com')
                    ->where('name', '=', $item['oppejoud'])->first()
                ) {
                    DB::table('users')->insert([
                        'name' => $item['oppejoud'],
                        'email' => $item['oppejoud'] . '@gmail.com',
                        'password' => bcrypt('123456'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }

//subject
            foreach ($results as $item) {
                if (!DB::table('subjects')
                    ->where('name', '=', $item['aine'])
                    ->where('subject_code', '=', $item['kood'])
                    ->where('semester', '=', $item['semester'])
                    ->where('language', '=', $item['oppekeel'])->first()
                ) {
                    DB::table('subjects')->insert(
                        array(
                            'name' => $item['aine'],
                            'subject_code' => $item['kood'],
                            'semester' => $item['semester'],
                            'language' => $item['oppekeel'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ));
                }
            }
//groups

            foreach ($results as $item) {
                if (!DB::table('groups')->where('code', '=', $item['ruehm'])->first()) {
                    DB::table('groups')->insert(
                        array(
                            'code' => $item['ruehm'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ));
                }


            }

//subject_users(attendances)

            foreach ($results as $item) {
                if (!DB::table('pivots')
                    ->where('user_id', '=',
                        User::where('name', '=', $item['oppejoud'])->firstOrFail()->id)
                    ->where('subject_id', '=',
                        Subject::where('name', '=', $item['aine'])
                        ->where('subject_code', '=', $item['kood'])
                        ->where('semester', '=', $item['semester'])
                        ->where('language', '=', $item['oppekeel'])->firstOrFail()->id)
                    ->where('group_id','=',
                        Group::where('code', '=', $item['ruehm'])->firstOrFail()->id)
                    ->first()
                ) {
//                    foreach (Student::where('group_code', '=', Group::where('code', '=', $item['ruehm'])->firstOrFail()->id)->get() as $item1) {
                    DB::table('pivots')->insert(
                        array(
                            'user_id' => User::where('name', '=', $item['oppejoud'])->firstOrFail()->id,
                            'subject_id' => Subject::where('name', '=', $item['aine'])
                                ->where('subject_code', '=', $item['kood'])
                                ->where('semester', '=', $item['semester'])
                                ->where('language', '=', $item['oppekeel'])->firstOrFail()->id,
                            'group_id' => Group::where('code', '=', $item['ruehm'])->firstOrFail()->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ));
//                    }
                }


//                ---------------
//                foreach ($results as $item) {
//                    foreach (Student::where('group_code', '=', Group::where('code', '=', $item['ruehm'])->firstOrFail()->id)->get() as $item1) {
//
//                        DB::table('attendances')->insert(
//                            array(
//                                'user_id' => 1,
//                                'subject_id' => 1,
//                                'student_id' => $item1->id,
//                                'created_at' => Carbon::now(),
//                                'updated_at' => Carbon::now(),
//                            ));
//                    }
//                }
//                ---------------
            }
            
//group_subject
//            foreach ($results as $item) {
//                if (!DB::table('group_subjects')
//                    ->where('group_id', '=', Group::where('code', '=', $item['ruehm'])->firstOrFail()->id)
//                    ->where('subject_id', '=', Subject::where('name', '=', $item['aine'])
//                        ->where('subject_code', '=', $item['kood'])
//                        ->where('semester', '=', $item['semester'])
//                        ->where('language', '=', $item['oppekeel'])->firstOrFail()->id)->first()
//                ) {
//                    DB::table('group_subjects')->insert(
//                        array(
//                            'group_id' => Group::where('code', '=', $item['ruehm'])->firstOrFail()->id,
//                            'subject_id' => Subject::where('name', '=', $item['aine'])
//                                ->where('subject_code', '=', $item['kood'])
//                                ->where('semester', '=', $item['semester'])
//                                ->where('language', '=', $item['oppekeel'])->firstOrFail()->id,
//                            'created_at' => Carbon::now(),
//                            'updated_at' => Carbon::now(),
//                        ));
//                }
//            }
            

//user_subject
//            foreach ($results as $item) {
//                if (!DB::table('subject_users')
//                    ->where('user_id', '=',
//                        User::where('name', '=', $item['oppejoud'])->firstOrFail()->id)
//                    ->where('subject_id', '=', Subject::where('name', '=', $item['aine'])
//                        ->where('subject_code', '=', $item['kood'])
//                        ->where('semester', '=', $item['semester'])
//                        ->where('language', '=', $item['oppekeel'])->firstOrFail()->id)->first()
//                ) {
//                    DB::table('subject_users')->insert(
//                        array(
//                            'user_id' => User::where('name', '=', $item['oppejoud'])->firstOrFail()->id,
//                            'subject_id' => Subject::where('name', '=', $item['aine'])
//                                ->where('subject_code', '=', $item['kood'])
//                                ->where('semester', '=', $item['semester'])
//                                ->where('language', '=', $item['oppekeel'])->firstOrFail()->id,
//                            'created_at' => Carbon::now(),
//                            'updated_at' => Carbon::now(),
//                        ));
//                }
//            }
        });
        return redirect('subjects');
    }
}
