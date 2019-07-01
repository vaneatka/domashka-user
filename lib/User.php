<?php
    class User{
      private $username;
      private $email;
      private $password;
      private $avatar;

      public function __construct($username, $email, $password, $avatar){
        $this->setUsername($username);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setAvatar($avatar);
      }

      public function __toString(){
        return json_encode($this);
      }

      public function save(){
        $time = date('Y-m-d');
        file_put_contents("database/{$time}.ser", serialize($this));
        if (isset($this->avatar)){
          $adr = "avatars/$this->username.jpg";
          file_put_contents($adr, file_get_contents($this->avatar) );
        }
      }

      


        // добавить в класс 4 приватных свойств:
            // username, email, password, avatar
        // и два магических метода:
            // __construct(),__toString()

        // добавить setters/getters для всех свойств класса
            // сеттерами применить валидацию:
                // username - минимум 5 символов
                //          - можно использовать только a..z0..9_

                // email    - должен содержать "@" и "." в указаном порядке

                // password - минимум 6 символов

                // avatar   - только адресса каринок с  PNG/JPG/JPEG

        // добавить мето save() который сохраняет как JSON текущий обьект
        // в папку "database" имя файла соответствует "time()" когда сохраняется
        // файл

        // при сохранении пользователя - его аватар (если назначен) копируется
        // в папку "avatars"

        // добавить load( $filename ) который загружает значения свойств из
        // указанного JSON файла



    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
      if(preg_match('/^[a-z0-9_]{5,}$/', $username)) {
        $this->username = $username;
      }
        else print "Wrong symbols";
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
     //Valid email!
     $this->email = $email;
   } else {
     print "Wrong email syntax";
      }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
      if(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password)) {
        $this->password = $password;
      }else {
        print "Wrong password syntax";
         }
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
      if(preg_match('/^[^?]*\.(jpg|jpeg|gif|png)/', $avatar)) {
        $this->avatar = $avatar;
      }else {
        print "Wrong image syntax";
         }
    }

      public function load($date){
        $loaded = unserialize(file_get_contents("database/$date.ser"));  
        var_dump($loaded);
        $this->setAvatar($loaded->avatar);      
        $this->setEmail($loaded->email);      
        $this->setPassword($loaded->password);      
        $this->setUsername($loaded->username);     
        
      }

}
?>
