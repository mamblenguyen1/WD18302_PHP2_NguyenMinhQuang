<?
include 'Model.php';
$list_of_key = get_key();
// $list_of_courses =  get_courses();
if (isset($_POST['submit'])) {
    $semester = $_POST['courses'];
    $course_name = find_by_semester($semester);
    $page_content = $course_name;
}
include 'View.php';
?>