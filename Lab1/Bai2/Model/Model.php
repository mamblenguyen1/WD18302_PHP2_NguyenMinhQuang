<?

function get_courses()
{
    include 'data.php';
    return array_values($courses);
}
function get_key()
{
    include 'data.php';
    return array_keys($courses);
}

function find_by_semester($semester)
{
    include 'data.php';
    return (array_key_exists($semester, $courses) ? $courses[$semester] : 'Invalid course');
}


?>