<?
echo 'PC07626 - Lab 1.2 <br> ';
?>
<div class="search-box">
    <div class="result">
        <h2>
            <?
            if (isset($page_content)) {
                echo $page_content;
            }
            ?>
        </h2>
    </div>

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
</div>
<style>
    .search-box {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        text-align: center;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        margin-top: 20px;
    }


    select,
    button {
        padding: 10px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }
</style>