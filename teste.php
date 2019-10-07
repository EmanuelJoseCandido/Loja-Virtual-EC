<?php

    echo "<label for='idQuantidade'>Quantidade: </label>
    <select name='quantidade' id='idQuantidade'>
        <optgroup>
            ";
            for($i = 1; $i <= 10; $i++)
            {
                echo"<option>$i</option>";
            } 
        echo"  
        </optgroup>
    </select>";
?>