<?php
class Student {

    public string $name;
    public string $group;
    public int $score;

    public function __construct(?string $name, ?string $group, int $score) {
        $this->name = $name;
        $this->group = $group;
        $this->score = $score;
    }public function setGroup(?string $group) {
        $this->group = $group;
    }

    public static function setGroupByName($students, $name, $newGroup) {
        foreach ($students as $student) {
            if ($student->name == $name) {
                $student->setGroup($newGroup);
                break;
            }
        }
    }

    public function displayInfo() {
        echo "Name: " . $this->name . ", Group: " . $this->group . ", Score: " . $this->score . "<br>";
    }

    public static function averagePerGroup($students, $group) {

        $sum = 0;
        $count = 0;

        foreach ($students as $student) {
            if ($student->group == $group) {
                $sum += $student->score;
                $count++;
            }
        }

        return $sum / $count;

    }

}

$students = [
    new Student("Aurélien", "A", 17),
    new Student("Giuseppe", "A", 16),
    new Student("Otman", "A", 17),
    new Student("Damien", "A", 15),
    new Student("Alexis", "A", 16),
    new Student("Ugur", "A", 18),
    new Student("Husehin", "A", 19),
    new Student("Mathias", "A", 20),
    new Student("Robin", "A", 15),
    new Student("Marvin", "A", 16),

    new Student("Julien", "B", 17),
    new Student("Alice", "B", 13),
    new Student("Cassidy", "B", 16),
    new Student("Hanen", "B", 18),
    new Student("Jeremy", "B", 19),
    new Student("Stacy", "B", 20),
    new Student("Nicolas", "B", 15),
    new Student("Thomas", "B", 16),
    new Student("Winona", "B", 17),
    new Student("Maoro", "B", 15),
];

echo "Average for group A: " . Student::averagePerGroup($students, "A") . "<br>";
echo "<br>";
foreach ($students as $student) {
    if ($student->group == "A") {
        $student->displayInfo();
        
    }
}
echo "<br>";
echo "Average for group B: " . Student::averagePerGroup($students, "B") . "<br>";
echo "<br>";
foreach ($students as $student) {
    if ($student->group == "B") {
        $student->displayInfo();
        
    }
}

Student::setGroupByName($students, "Mathias", "B");
Student::setGroupByName($students, "Alice", "A");
echo "<br>";
echo "After student change:"."<br>";
echo "<br>";
echo "Average for group A: " . Student::averagePerGroup($students, "A") . "<br>";
echo "<br>";
foreach ($students as $student) {
    if ($student->group == "A") {
        $student->displayInfo();
        
    }
}
echo "<br>";
echo "Average for group B: " . Student::averagePerGroup($students, "B") . "<br>";
echo "<br>";
foreach ($students as $student) {
    if ($student->group == "B") {
        $student->displayInfo();
        
    }
}
?>