# ValidateExcelFileFormat
a psr-4 package to validate excel file format and its data. It validate unlimited type of excel files by just adding or define rule to each type.

#### General Rules
1. Column name that starts with # should not contain any space
2. Column name that ends with * is a required column, means it
must have a value
3. For each file type, it validates the header columns name and and the amount of columns it has. For example, Type_A file should only contains 5 columns and the header column name should be and follows the following order;
- Field_A*
- #Field_B
- Field_C
- Field_D*
- Field_E*
4. The package validate both .xls and .xlsx files


##### Sample Output when validating Type_A.xlsx

| Row  | Error  |
| ------------ | ------------ |
| 3  | Missing value in Field_A, Field_B should not contain any space, Missing value in Field_D  |
|  4 | Missing value in Field_A,Missing value in Field_E  |
