<?php
function parse_csv($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = ['item', 'parsed_data'];
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            if (!('' == $row[5])
                && strstr($row[3], ':')
                && !(preg_match('/Initial sample/im', $row[5]))
                && !(preg_match('/7.0mm RD CZ/im', $row[5]))) {
                if (preg_match('/SKU:/', $row[5])) {
                    $note = substr($row[5], strpos($row[5], 'SKU:') + 4); // обрезка после SKU
                } elseif (preg_match('/SKU/', $row[5])) {
                    $note = substr($row[5], strpos($row[5], 'SKU') + 4); // обрезка после SKU:
                } elseif (preg_match('/with:/', $row[5])) {
                    $note = substr($row[5], strpos($row[5], 'with:') + 6); // обрезка после with:
                } elseif (preg_match('/with/', $row[5])) {
                    $note = substr($row[5], strpos($row[5], 'with') + 5); // обрезка после with
                }
                $note = preg_match('/arriving|Arriving/', $note)
                    ? stristr($note, 'arriving', true) : $note; // обрезка до arriving
                $note = rtrim($note);
                $note = explode(',', $note);
                foreach ($note as $value) {
                    switch ($value) {
                        case preg_match('/Carat/', $value):
                        $arr_values = explode(' ',$value);

                    }
                }
                $data[] = array_combine($header, [
                    $row[3],
                    [
                        'descripiton' => $row[4],
                        'notes' => [$note, $row[5]]
                    ]
                ]);
            }
        }
        fclose($handle);
    }
    return $data;
}

//$subject = 'Set with: MO7.0CU1 Description: 7mm Super Premium Cushion Moissanite Arriving from sf on 7/24/2019';
//$note = substr($subject, strpos($subject, 'with:') + 6);
//$note = rtrim(substr($note, 0, stripos($note, 'arriving'))); // обрезка до arriving
//var_dump($note);

$arr = parse_csv('searchresults.csv', ',');
var_dump($arr);



