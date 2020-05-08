PHP Magic Method
================

* Magic method trong PHP là những phương thức rất đặc biệc, vì nhiệm vụ của nó là bắt một sự kiện (event) nào đó khi chúng ta thao tác tới đối tượng. Tất cả các phương thức Magic methods đều có tên bắt đầu bằng hai dấu gạch dưới (__).

## __construct() & __destruct()
-------------

- Hàm __construct() được gọi 1 cách tự động khi mà object được khởi tạo lần đầu tiên.
- Hàm __destruct thì ngược lại.
```php
    class Person {
        private $name;
        private $age;
        private $sex;

        public function __construct($name="", $age=22, $sex="Male") {
            $this->name = $name;
            $this->age = $age;
            $this->sex = $sex;
        }
        public function say() {
            echo "Name：" . $this->name . ",Sex：" . $this->sex . ",Age：" . $this->age;
        }
        public function __destruct() {
            echo "Destroying " . __CLASS__ . "\n";
        }
    }
    $person1 = new Person();
    echo $person1->say(); //print:Name：,Sex：Male,Age：22
```
