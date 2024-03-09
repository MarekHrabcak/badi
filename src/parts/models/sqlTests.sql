-- Count average 
SELECT AVG(minimum_value) AS average_minimum
FROM (
    SELECT MIN(sl) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
    UNION ALL
    SELECT MIN(m) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
    UNION ALL
    SELECT MIN(o) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
    UNION ALL
    SELECT MIN(s) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
    UNION ALL
    SELECT MIN(ed) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
    UNION ALL
    SELECT MIN(ee) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
    UNION ALL
    SELECT MIN(a) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
    UNION ALL
    SELECT MIN(ide) AS minimum_value FROM wcsa WHERE dataclass LIKE '%9%'
) AS minimum_values;

Output: 0.1250

-- Select rows only
    -- working
SELECT 
    AVG(min_sl) AS avg_sl,
    AVG(min_m) AS avg_m,
    AVG(min_o) AS avg_o,
    AVG(min_s) AS avg_s,
    AVG(min_ed) AS avg_ed,
    AVG(min_ee) AS avg_ee,
    AVG(min_a) AS avg_a,
    AVG(min_ide) AS avg_ide
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE dataclass LIKE '%9%'
) AS min_values;

Output: 
avg_sl
avg_m
avg_o
avg_s
avg_ed
avg_ee
avg_a
avg_ide
0.0000
1.0000
0.0000
0.0000
0.0000
0.0000
0.0000
0.0000


-- Select using variable 

-- version1
SET @search_number = 9;

SELECT AVG(minimum_value) AS average_minimum
FROM (
    SELECT MIN(sl) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(m) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(o) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(s) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(ed) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(ee) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(a) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(ide) AS minimum_value FROM wcsa WHERE dataclass LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
) AS minimum_values;

-- version2 NOT Working
SET @search_number = 9;
SET @aspect = 'dataclass';

SELECT AVG(minimum_value) AS average_minimum
FROM (
    SELECT MIN(sl) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(m) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(o) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(s) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(ed) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(ee) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(a) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(ide) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
) AS minimum_values;


        -- Only 1 row
SET @search_number = 9;
SET @aspect = 'dataclass';

SELECT AVG(minimum_value) AS average_minimum
FROM (
    SELECT MIN(m) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
) AS minimum_values;




SET @search_number = 9;
SET @aspect = 'dataclass';

SELECT AVG(minimum_value) AS average_minimum
FROM (
    SELECT MIN(sl) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
    UNION ALL
    SELECT MIN(m) AS minimum_value FROM wcsa WHERE @aspect LIKE CONCAT('%', @search_number, '%') COLLATE utf8mb4_unicode_ci
) AS minimum_values;



-- Version3
--   working
SELECT 
    AVG(min_sl) AS avg_sl,
    AVG(min_m) AS avg_m,
    AVG(min_o) AS avg_o,
    AVG(min_s) AS avg_s,
    AVG(min_ed) AS avg_ed,
    AVG(min_ee) AS avg_ee,
    AVG(min_a) AS avg_a,
    AVG(min_ide) AS avg_ide
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE dataclass LIKE '%9%'
) AS min_values;


-- not working
SET @aspect_value = 9;
SET @aspect_name = 'dataclass';

SELECT 
    AVG(min_sl) AS avg_sl,
    AVG(min_m) AS avg_m,
    AVG(min_o) AS avg_o,
    AVG(min_s) AS avg_s,
    AVG(min_ed) AS avg_ed,
    AVG(min_ee) AS avg_ee,
    AVG(min_a) AS avg_a,
    AVG(min_ide) AS avg_ide
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE @aspect_name LIKE CONCAT('%', @search_number, '%')
) AS min_values;


-- not working
SET @aspect_value = 9;
SET @aspect_name = 'dataclass';

SELECT 
    AVG(minimum_value) AS average_minimum
FROM (
    SELECT 
        LEAST(MIN(sl), MIN(m), MIN(o), MIN(s), MIN(ed), MIN(ee), MIN(a), MIN(ide)) AS minimum_value
    FROM wcsa
    WHERE @aspect_name LIKE CONCAT('%', @aspect_value, '%') COLLATE utf8mb4_unicode_ci
) AS minimum_values;



-- not working
SET @aspect_value = 9;

SELECT 
    AVG(minimum_value) AS average_minimum
FROM (
    SELECT 
        LEAST(MIN(sl), MIN(m), MIN(o), MIN(s), MIN(ed), MIN(ee), MIN(a), MIN(ide)) AS minimum_value
    FROM wcsa
    WHERE dataclass LIKE CONCAT('%', @aspect_value, '%') COLLATE utf8mb4_unicode_ci
) AS minimum_values;

-- working
SELECT
    (avg_sl + avg_m + avg_o + avg_s + avg_ed + avg_ee + avg_a + avg_ide) / 8 AS overall_average
FROM (
    SELECT 
        AVG(min_sl) AS avg_sl,
        AVG(min_m) AS avg_m,
        AVG(min_o) AS avg_o,
        AVG(min_s) AS avg_s,
        AVG(min_ed) AS avg_ed,
        AVG(min_ee) AS avg_ee,
        AVG(min_a) AS avg_a,
        AVG(min_ide) AS avg_ide
    FROM (
        SELECT 
            MIN(sl) AS min_sl,
            MIN(m) AS min_m,
            MIN(o) AS min_o,
            MIN(s) AS min_s,
            MIN(ed) AS min_ed,
            MIN(ee) AS min_ee,
            MIN(a) AS min_a,
            MIN(ide) AS min_ide
        FROM wcsa
        WHERE dataclass LIKE '%9%'
    ) AS min_values
) AS avg_values;

--- WORKING

SELECT
    (min_sl + min_m + min_o + min_s + min_ed + min_ee + min_a + min_ide) / 8 AS overall_average
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE dataclass LIKE '%9%'
) AS min_values;


-- WORKING !!!
SET @aspect_value = 9;
SET @aspect_name = 'dataclass';

SET @condition = CONCAT('%', @aspect_value, '%');

SELECT
    (min_sl + min_m + min_o + min_s + min_ed + min_ee + min_a + min_ide) / 8 AS overall_average
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE dataclass LIKE @condition
) AS min_values;

-- Working !!!

SET @aspect_value = 9;
SET @aspect_name = 'dataclass';

SELECT
    (min_sl + min_m + min_o + min_s + min_ed + min_ee + min_a + min_ide) / 8 AS overall_average
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE dataclass LIKE CONCAT('%', @aspect_value, '%')
) AS min_values;


-- Working s ignoraciou nul !!!!

SET @aspect_value = 9;
SET @aspect_name = 'dataclass';

SELECT
    (min_sl + min_m + min_o + min_s + min_ed + min_ee + min_a + min_ide) / 8 AS overall_average
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE dataclass LIKE CONCAT('%', @aspect_value, '%')
        AND (sl BETWEEN 1 AND 9)
        AND (m BETWEEN 1 AND 9)
        AND (o BETWEEN 1 AND 9)
        AND (s BETWEEN 1 AND 9)
        AND (ed BETWEEN 1 AND 9)
        AND (ee BETWEEN 1 AND 9)
        AND (a BETWEEN 1 AND 9)
        AND (ide BETWEEN 1 AND 9)
) AS min_values;



-- rob to pre ID
SET @id = 1;

SELECT
    (min_sl + min_m + min_o + min_s + min_ed + min_ee + min_a + min_ide) / 8 AS overall_average
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM wcsa
    WHERE id LIKE CONCAT('%', @id, '%')
        AND (sl BETWEEN 1 AND 9)
        AND (m BETWEEN 1 AND 9)
        AND (o BETWEEN 1 AND 9)
        AND (s BETWEEN 1 AND 9)
        AND (ed BETWEEN 1 AND 9)
        AND (ee BETWEEN 1 AND 9)
        AND (a BETWEEN 1 AND 9)
        AND (ide BETWEEN 1 AND 9)
) AS min_values;



-- Yet another approach - minimum for selected ID's
-- for id = 1
SELECT 
MIN(sl) AS sl, MIN(m) AS m, MIN(o) AS o, MIN(s) AS s, 
MIN(ed) AS ed, MIN(ee) AS ee, MIN(a) AS a, MIN(ide) AS ide,
MIN(lc) AS lc, MIN(li) AS li, MIN(lav) AS lav, MIN(lac) AS lac,
MIN(fd) AS fd, MIN(rd) AS rd, MIN(nc) AS nc, MIN(pv) AS pv

FROM `wcsa` WHERE id = 1;

-- for id = 1, 2, 3
SELECT 
    MIN(sl) AS sl, MIN(m) AS m, MIN(o) AS o, MIN(s) AS s, 
    MIN(ed) AS ed, MIN(ee) AS ee, MIN(a) AS a, MIN(ide) AS ide,
    MIN(lc) AS lc, MIN(li) AS li, MIN(lav) AS lav, MIN(lac) AS lac,
    MIN(fd) AS fd, MIN(rd) AS rd, MIN(nc) AS nc, MIN(pv) AS pv
FROM `wcsa` 
WHERE id IN (1, 2, 3); -- Add your custom selected IDs here




-- and the last SQL select with average
 SELECT
    (min_sl + min_m + min_o + min_s + min_ed + min_ee + min_a + min_ide) / 8 AS overall_average
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
FROM `wcsa` 
WHERE id IN (1, 2, 3)
        AND (sl BETWEEN 1 AND 9)
        AND (m BETWEEN 1 AND 9)
        AND (o BETWEEN 1 AND 9)
        AND (s BETWEEN 1 AND 9)
        AND (ed BETWEEN 1 AND 9)
        AND (ee BETWEEN 1 AND 9)
        AND (a BETWEEN 1 AND 9)
        AND (ide BETWEEN 1 AND 9)
) AS min_values


SELECT
    (COALESCE(min_sl, 0) + COALESCE(min_m, 0) + COALESCE(min_o, 0) + COALESCE(min_s, 0) + COALESCE(min_ed, 0) + COALESCE(min_ee, 0) + COALESCE(min_a, 0) + COALESCE(min_ide, 0)) / 8 AS overall_average
FROM (
    SELECT 
        MIN(sl) AS min_sl,
        MIN(m) AS min_m,
        MIN(o) AS min_o,
        MIN(s) AS min_s,
        MIN(ed) AS min_ed,
        MIN(ee) AS min_ee,
        MIN(a) AS min_a,
        MIN(ide) AS min_ide
    FROM `wcsa` 
    WHERE id IN (1, 2)
        AND (sl BETWEEN 1 AND 9)
        AND (m BETWEEN 1 AND 9)
        AND (o BETWEEN 1 AND 9)
        AND (s BETWEEN 1 AND 9)
        AND (ed BETWEEN 1 AND x9)
        AND (ee BETWEEN 1 AND 9)
        AND (a BETWEEN 1 AND 9)
        AND (ide BETWEEN 1 AND 9)
) AS min_values;


-- TOTO funguje na 1 faktor !!!
SELECT
    COALESCE(min_m, 0) / 4 AS overall_average
FROM (
    SELECT 
    MIN(m) AS min_m
    FROM `wcsa` 
    WHERE id IN (1, 3)

     AND (m BETWEEN 1 AND 9)
        
) AS min_values


-- WORKING !!!
SELECT MIN(min_sl), MIN(min_m) 
FROM (
    SELECT 
        sl AS min_sl, 
        m AS min_m
    FROM `wcsa` 
    WHERE id IN (22,23, 24, 25)
        AND (sl BETWEEN 1 AND 9)
        AND (m BETWEEN 1 AND 9)
) as my_values;




SELECT
    (COALESCE(fa_sl, 0) + COALESCE(fa_m, 0)) / 8 AS overall_average
FROM (
    SELECT MIN(min_sl) AS fa_sl, MIN(min_m) AS fa_m
    FROM (
        SELECT 
            sl AS min_sl, 
            m AS min_m
        FROM `wcsa` 
        WHERE id IN (22, 23, 24, 25)
            AND sl BETWEEN 1 AND 9
            AND m BETWEEN 1 AND 9
    ) AS my_values
) AS my_output;



SELECT
    (fa_sl + fa_m) / 4 AS overall_average
FROM (
    SELECT MIN(min_sl) AS fa_sl, MIN(min_m) AS fa_m
    FROM (
        SELECT 
            COALESCE(sl,0) AS min_sl, 
            COALESCE(m,0) AS min_m
        FROM `wcsa` 
        WHERE id IN (22, 23, 24, 25)
            AND sl BETWEEN 1 AND 9
            AND m BETWEEN 1 AND 9
    ) AS my_values
) AS my_output;



-- WORKING !!!
SELECT 
	(COALESCE(min_sl, 0) + COALESCE(min_m, 0)) / 4 AS overall_average
FROM (
	SELECT 
    	MIN(my_sl) AS min_sl, 
    	MIN(my_m) AS min_m 
    FROM (
        SELECT 
          sl AS my_sl, 
          m AS my_m
        FROM `wcsa` 
        WHERE id IN (1,5)
    ) as my_values
) AS myOutput


--- WORKING !!!!
SELECT 
    (COALESCE(min_sl, 0) + COALESCE(min_m, 0) + COALESCE(min_o, 0) + COALESCE(min_s, 0) + COALESCE(min_ed, 0) + COALESCE(min_ee, 0) + COALESCE(min_a, 0) + COALESCE(min_ide, 0)) / 8 AS overall_average
FROM (
	SELECT 
        MIN(my_sl) AS min_sl,
        MIN(my_m) AS min_m,
        MIN(my_o) AS min_o,
        MIN(my_s) AS min_s,
        MIN(my_ed) AS min_ed,
        MIN(my_ee) AS min_ee,
        MIN(my_a) AS min_a,
        MIN(my_ide) AS min_ide
    FROM (
        SELECT 
            sl AS my_sl,
            m AS my_m,
            o AS my_o,
            s AS my_s,
            ed AS my_ed,
            ee AS my_ee,
            a AS my_a,
            ide AS my_ide
        FROM `wcsa` 
        WHERE id IN (9,10)
    ) as my_values
) AS myOutput;


-- WORKING !!!

SET @id_list = '1,2,9,10,22,25,65,7';

SELECT 
    (COALESCE(min_sl, 0) + COALESCE(min_m, 0) + COALESCE(min_o, 0) + COALESCE(min_s, 0) + COALESCE(min_ed, 0) + COALESCE(min_ee, 0) + COALESCE(min_a, 0) + COALESCE(min_ide, 0)) / 8 AS overall_average
FROM (
    SELECT 
        MIN(my_sl) AS min_sl,
        MIN(my_m) AS min_m,
        MIN(my_o) AS min_o,
        MIN(my_s) AS min_s,
        MIN(my_ed) AS min_ed,
        MIN(my_ee) AS min_ee,
        MIN(my_a) AS min_a,
        MIN(my_ide) AS min_ide
    FROM (
        SELECT 
            sl AS my_sl,
            m AS my_m,
            o AS my_o,
            s AS my_s,
            ed AS my_ed,
            ee AS my_ee,
            a AS my_a,
            ide AS my_ide
        FROM `wcsa` 
        WHERE FIND_IN_SET(id, @id_list) > 0
    ) AS my_values
) AS myOutput;


-- PHP function
<?php

function calculateOverallAverage($id_list) {
    // Establish a connection to the database
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement with placeholders
    $sql = "
    SELECT 
        (COALESCE(min_sl, 0) + COALESCE(min_m, 0) + COALESCE(min_o, 0) + COALESCE(min_s, 0) + COALESCE(min_ed, 0) + COALESCE(min_ee, 0) + COALESCE(min_a, 0) + COALESCE(min_ide, 0)) / 8 AS overall_average
    FROM (
        SELECT 
            MIN(my_sl) AS min_sl,
            MIN(my_m) AS min_m,
            MIN(my_o) AS min_o,
            MIN(my_s) AS min_s,
            MIN(my_ed) AS min_ed,
            MIN(my_ee) AS min_ee,
            MIN(my_a) AS min_a,
            MIN(my_ide) AS min_ide
        FROM (
            SELECT 
                sl AS my_sl,
                m AS my_m,
                o AS my_o,
                s AS my_s,
                ed AS my_ed,
                ee AS my_ee,
                a AS my_a,
                ide AS my_ide
            FROM `wcsa` 
            WHERE FIND_IN_SET(id, :id_list) > 0
        ) AS my_values
    ) AS myOutput;
    ";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the parameter
    $stmt->bindParam(':id_list', $id_list);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Close the connection
    $pdo = null;

    // Return the overall average
    return $result['overall_average'];
}

// Example usage
$id_list = '1,2,9,10,22,25,65,7';
$overall_average = calculateOverallAverage($id_list);
echo "Overall Average: " . $overall_average;
?>




-- SELECT UNIQUE DATACLASS
SELECT *
FROM wcsa
WHERE wcsa_name LIKE 'dc(%'
AND dataclass IS NOT NULL AND dataclass <> ''
AND id IN (
    SELECT MIN(id)
    FROM wcsa
    WHERE wcsa_name LIKE 'dc(%'
    AND dataclass IS NOT NULL AND dataclass <> ''
    GROUP BY dataclass
);







<?php

function calculateOverallAverage($model_name, $model_description, $dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv) {
    // Concatenate the variables into id_list
    $id_list = implode(',', [$model_name, $model_description, $dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv]);

    // Establish a connection to the database
    $pdo = new PDO('mysql:host=localhost;dbname=your_database_name', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement with placeholders
    $sql = "
    SELECT 
        (COALESCE(min_sl, 0) + COALESCE(min_m, 0) + COALESCE(min_o, 0) + COALESCE(min_s, 0) + COALESCE(min_ed, 0) + COALESCE(min_ee, 0) + COALESCE(min_a, 0) + COALESCE(min_ide, 0)) / 8 AS overall_average
    FROM (
        SELECT 
            MIN(my_sl) AS min_sl,
            MIN(my_m) AS min_m,
            MIN(my_o) AS min_o,
            MIN(my_s) AS min_s,
            MIN(my_ed) AS min_ed,
            MIN(my_ee) AS min_ee,
            MIN(my_a) AS min_a,
            MIN(my_ide) AS min_ide
        FROM (
            SELECT 
                sl AS my_sl,
                m AS my_m,
                o AS my_o,
                s AS my_s,
                ed AS my_ed,
                ee AS my_ee,
                a AS my_a,
                ide AS my_ide
            FROM `wcsa` 
            WHERE FIND_IN_SET(id, :id_list) > 0
        ) AS my_values
    ) AS myOutput;
    ";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind the parameter
    $stmt->bindParam(':id_list', $id_list);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Close the connection
    $pdo = null;

    // Return the overall average
    return $result['overall_average'];
}

// Example usage
$model_name = 'model_name';
$model_description = 'model_description';
$dataclass = 'dataclass';
$architect = 'architect';
$netloc = 'netloc';
$authfact = 'authfact';
$sign = 'sign';
$enc = 'enc';
$userpriv = 'userpriv';

$overall_average = calculateOverallAverage($model_name, $model_description, $dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv);
echo "Overall Average: " . $overall_average;
?>






SELECT 
    COALESCE(MIN(my_sl), 0) AS min_sl,
    COALESCE(MIN(my_m), 0) AS min_m,
    COALESCE(MIN(my_o), 0) AS min_o,
    COALESCE(MIN(my_s), 0) AS min_s,
    COALESCE(MIN(my_ed), 0) AS min_ed,
    COALESCE(MIN(my_ee), 0) AS min_ee,
    COALESCE(MIN(my_a), 0) AS min_a,
    COALESCE(MIN(my_ide), 0) AS min_ide,
    COALESCE(MIN(my_lc), 0) AS min_lc, 
    COALESCE(MIN(my_li), 0) AS min_li, 
    COALESCE(MIN(my_lav), 0) AS min_lav, 
    COALESCE(MIN(my_lac), 0) AS min_lac,
    COALESCE(MIN(my_fd), 0) AS min_fd, 
    COALESCE(MIN(my_rd), 0) AS min_rd, 
    COALESCE(MIN(my_nc), 0) AS min_nc, 
    COALESCE(MIN(my_pv), 0) AS min_pv
FROM (
    SELECT 
        sl AS my_sl,
        m AS my_m,
        o AS my_o,
        s AS my_s,
        ed AS my_ed,
        ee AS my_ee,
        a AS my_a,
        ide AS my_ide,
        lc AS my_lc,
        li AS my_li,
        lav AS my_lav,
        lac AS my_lac,
        fd AS my_fd,
        rd AS my_rd,
        nc AS my_nc,
        pv AS my_pv
    FROM `wcsa` 
    WHERE id IN (0, 1, 2, 3)
) as my_values;

















