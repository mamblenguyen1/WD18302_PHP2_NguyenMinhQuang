<?php
$courses = [
    's1' => 'course1',
    's2' => 'course2',
    's3' => 'course3'
];

function get_courses()
{
    global $courses;
    return array_values($courses);
}

function find_by_semester($semester)
{
    global $courses;
    return (array_key_exists($semester, $courses) ? $courses[$semester] : 'Invalid course');
}

$list_of_courses =  get_courses();
$semester  = (!empty($_GET['semester']) ? $_GET['semester'] : '');
$course_name = find_by_semester($semester);
$page_content = $course_name;
?>


<?= $page_content; ?>
<select name="courses" id="">
    <?
    foreach ($list_of_courses as $course_name) : ?>
        <option value=""><?= $course_name ?></option>
    <?
    endforeach;
    ?>
</select>