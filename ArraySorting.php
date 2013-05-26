<?php

class ArraySorting
{
    public function sortByMultiCols(array $arr, array $sortBy)
    {
        // Obtain a list of columns
        $sortsBy = array();
        foreach ($arr as $rowKey => $row) {
            foreach ($sortBy as $sortKey => $sortOrder) {
                $sortsBy[$sortKey][$rowKey] = $row[$sortKey];
            }
        }
        
        $msArgs = array();
        foreach ($sortsBy as $key => $values) {
            $msArgs[] = $values;
            $msArgs[] = $sortBy[$key];
        }
        
        $msArgs[] = &$arr;
        
        call_user_func_array('array_multisort', $msArgs);
        
        return $arr;
    }
}