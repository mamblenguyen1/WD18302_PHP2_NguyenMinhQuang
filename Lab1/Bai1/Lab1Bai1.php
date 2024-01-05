<?php
echo 'PC07626 - Lab 1.1 <br> ';
$courses = [
    'VL' => 'Vĩnh Long',
    'CT' => 'Cần Thơ',
    'KG' => 'Kiên Giang',
    'SG' => 'Sài Gòn',
    'HD' => 'Hải Dương',
    'HN' => 'Hà Nội',
    'HCM' => 'Hồ Chí Minh',
    'DN' => 'Đà Nẵng',
    'HP' => 'Hải Phòng',
    'BN' => 'Bắc Ninh'
];

function get_courses()
{
    global $courses;
    return array_values($courses);
}
function get_key()
{
    global $courses;
    return array_keys($courses);
}

function find_by_semester($semester)
{
    global $courses;
    return (array_key_exists($semester, $courses) ? $courses[$semester] : 'Invalid course');
}
$list_of_key = get_key();
// $list_of_courses =  get_courses();
if (isset($_POST['submit'])) {
    $semester = $_POST['courses'];
    $course_name = find_by_semester($semester);
    $page_content = $course_name;
}
// $semester  = (!empty($_GET['semester']) ? $_GET['semester'] : '');

?>


<?
if (isset($page_content)) {
    echo $page_content;
}
?>

<form action="" method="post">
    <select name="courses" id="">
        <?
        foreach ($list_of_key as $key) : ?>
            <option value="<?= $key ?>"><?= $key ?></option>
        <?
        endforeach;
        ?>
    </select>
    <button type="submit" name="submit">Tìm</button>
</form>