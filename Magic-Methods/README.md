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
    echo $person1->say();
    // Name：,Sex：Male,Age：22
    // Destroying Person
```
## __get() & __set()
-------------
- __set () sẽ tự động được gọi khi chúng ta thiết lập giá trị cho một thuộc tính không được phép truy cập từ bên ngoài, hoặc không tồn tại.
- __get () được sử dụng để đọc dữ liệu từ các thuộc tính không thể truy cập (được bảo vệ hoặc riêng tư) hoặc không tồn tại.
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
    }
    $people1 = new Person("Vu Minh Hieu", 20, "Female");
    $people1->age = 19;
    echo "<br>".$people1->name; // Vu Minh Hieu
    echo "<br>".$people1->age; // 19
```
