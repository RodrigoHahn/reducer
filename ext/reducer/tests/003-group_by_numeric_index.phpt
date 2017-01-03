--TEST--
group_by with numeric index
--FILE--
<?php
$ret = group_by([ 
    [ 'category' => 'Food', 'type' => 'pasta', 0 => 1, 'foo' => 10 ],
    [ 'category' => 'Food', 'type' => 'pasta', 0 => 1 ],
    [ 'category' => 'Food', 'type' => 'juice', 0 => 1 ],
    [ 'category' => 'Food', 'type' => 'juice', 0 => 1 ],
    [ 'category' => 'Book', 'type' => 'programming', 0 => 5 ],
    [ 'category' => 'Book', 'type' => 'programming', 0 => 2 ],
    [ 'category' => 'Book', 'type' => 'cooking', 0 => 6 ],
    [ 'category' => 'Book', 'type' => 'cooking', 0 => 2 ],
], ['category','type'], [
    0 => REDUCER_SUM,
    1 => REDUCER_COUNT,
]);
print_r($ret);
--EXPECT--
Array
(
    [0] => Array
        (
            [category] => Food
            [type] => pasta
            [0] => 2
            [1] => 1
        )

    [1] => Array
        (
            [category] => Food
            [type] => juice
            [0] => 2
            [1] => 1
        )

    [2] => Array
        (
            [category] => Book
            [type] => programming
            [0] => 7
            [1] => 1
        )

    [3] => Array
        (
            [category] => Book
            [type] => cooking
            [0] => 8
            [1] => 1
        )

)
