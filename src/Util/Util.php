<?php

namespace Acme\Util;

use PhpOffice\PhpSpreadsheet\IOFactory;

class Util
{
    public function pickHashAndStar($str)
    {
        if (strpos($str, "#") !== false) {
            $str = substr($str, 1);
        }
        if (strpos($str, "*") !== false) {
            $str = substr($str, 0, -1);
        }
        return $str;
    }

    public function validateData($file, $columnsName)
    {
        $result = array();
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();

        foreach ($worksheet->getRowIterator() as $row) {
            $resultForCurrentRow = "";
            $cellIterator = $row->getCellIterator();
            if ($row->getRowIndex() == 1) {
                foreach ($cellIterator as $cell) {

                    if ($columnsName[$cell->getColumn()] != $cell->getFormattedValue())
                        $resultForCurrentRow .= "Invalid header column name " . $cell->getFormattedValue() . ", ";
                }
            } else {
                foreach ($cellIterator as $cell) {
                    if ($columnsName[$cell->getColumn()][0] == "#") {
                        if ($cell->getFormattedValue() == $cell->getFormattedValue() && strpos($cell->getFormattedValue(), ' ') !== false) {
                            $resultForCurrentRow .= self::pickHashAndStar($columnsName[$cell->getColumn()]) . " should not contain any space, ";
                        }
                    }
                    if (substr($columnsName[$cell->getColumn()], -1, 1) == "*")
                        if ($cell->getFormattedValue() == "")
                            $resultForCurrentRow .= "Missing value in " . self::pickHashAndStar($columnsName[$cell->getColumn()]) . ", ";
                }
            }
            if ($resultForCurrentRow != "") {
                $resultForCurrentRow = substr($resultForCurrentRow, 0, $resultForCurrentRow . length - 2);
            }
            $result[$row->getRowIndex()] = $resultForCurrentRow;

        }
        return $result;
    }
}