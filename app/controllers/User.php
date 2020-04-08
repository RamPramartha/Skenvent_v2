<?php

defined( "BASEPATH" ) or die( "Direct scripting is not allowed." );

class User
{
  public function index()
  {
    if( isset( $_COOKIE["is_login"] ) ) {
      $formvalidation = Controller::loadLibrary( "FormValidation" );
      if( $formvalidation->run() == false ) {
        $data = [
          "title" => useEnv( "APPNAME" ) . " - User Page",
          "userdata" => DB::table( "tb_siswa" )->where( "id_user", $_COOKIE["userid"] )->get()
        ];
        Controller::useViews( ["templates.header", "user.index", "templates.footer"], $data );
      } else {
        echo "POST";
      }
    } else {
      redirect( null, FORBIDDEN_ERROR );
    }
  }

  // akan berufungsi ke halaman saat meminjam barang
  public function available()
  {
    if( isset( $_COOKIE["is_login"] ) ) {
    $formvalidation = Controller::loadLibrary( "FormValidation" );
      if( $formvalidation->run() == false ) {
        $data = [
          "title" => useEnv( "APPNAME" ) . " - Available Items",
          "userdata" => DB::table( "tb_siswa" )->where("id_user", $_COOKIE["userid"] )->get(),
          "items" => DB::table("tb_barang")->all()
        ];
        Controller::useViews( ["templates.header", "user.available", "templates.footer"], $data );
      } else {
        echo "POST";
      }
    } else {
      redirect( null, FORBIDDEN_ERROR );
    }
  }

  public function logout()
  {
    if( isset( $_COOKIE["is_login"] ) ) {
      unsetCookies(["userid", "is_login"]);
      redirect( base_url() );
    }
  }


}
