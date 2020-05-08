<?php
    class Person {
        private $name;
        private $age;
        private $sex;

        public function __construct($name="", $age=22, $sex="Male") {
            $this->name = $name;
            $this->age = $age;
            $this->sex = $sex;
        }
        public function __get($property) {
            //kiểm tra xem trong class có tồn tại thuộc tính không
            if (property_exists($this, $property)) {
                //tiến hành lấy giá trị
                return $this->$property;
            } else {
                die('Không tồn tại thuộc tính');
            }
        }
        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                echo "<br>gán giá trị cho property: ". $property;
                $this->$property = $value;
            } else {
                die('<br>Không tồn tại thuộc tính');
            }
        }
        public function say() {
            echo "<br>Name：" . $this->name . ",Sex：" . $this->sex . ",Age：" . $this->age . "\n";
        }
        public function getName() {
            echo "<br>".$this->name;
        }
        public function __destruct() {
            echo "<br>Destroying " . __CLASS__ . "\n";
        }
    }
    $people1 = new Person("Vu Minh Hieu", 20, "Female");
    $people1->age = 19;
    echo "<br>".$people1->name; // Vu Minh Hieu
    echo "<br>".$people1->age; // 19

?>