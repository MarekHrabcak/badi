SELECT * FROM `wcsa` where wcsa_name = "WCS" AND dataclass LIKE '%9%';


SET @digit = 0;
UPDATE `wcsa` SET `dataclass` = @digit WHERE `wcsa_name` = 'WCS' AND `dataclass` LIKE CONCAT('%', @digit, '%');


SET @word = 'another_word';
UPDATE `wcsa` SET `dataclass` = CONCAT(@word, '_', @digit) WHERE `wcsa_name` = 'WCS' AND `dataclass` LIKE CONCAT('%', @digit, '%');

-- dataclass
UPDATE `wcsa` SET `dataclass` = '9' WHERE `wcsa_name` = 'WCS' AND `dataclass` LIKE '%6%';
-- netloc
UPDATE `wcsa` SET `netloc` = '5' WHERE `wcsa_name` = 'WCS' AND `netloc` LIKE '%5%';
UPDATE `wcsa` SET `netloc` = '4' WHERE `wcsa_name` = 'WCS' AND `netloc` LIKE '%4%';
UPDATE `wcsa` SET `netloc` = '3' WHERE `wcsa_name` = 'WCS' AND `netloc` LIKE '%3%';
UPDATE `wcsa` SET `netloc` = '9' WHERE `wcsa_name` = 'WCS' AND `netloc` LIKE '%9%';

-- authfact
UPDATE `wcsa` SET `authfact` = '5' WHERE `wcsa_name` = 'WCS' AND `authfact` LIKE '%5%';
UPDATE `wcsa` SET `authfact` = '7' WHERE `wcsa_name` = 'WCS' AND `authfact` LIKE '%7%';
UPDATE `wcsa` SET `authfact` = '9' WHERE `wcsa_name` = 'WCS' AND `authfact` LIKE '%9%';

-- sign
UPDATE `wcsa` SET `sign` = '1' WHERE `wcsa_name` = 'WCS' AND `sign` LIKE '%1%';
UPDATE `wcsa` SET `sign` = '8' WHERE `wcsa_name` = 'WCS' AND `sign` LIKE '%8%';
UPDATE `wcsa` SET `sign` = '9' WHERE `wcsa_name` = 'WCS' AND `sign` LIKE '%9%';

-- enc
UPDATE `wcsa` SET `enc` = '4' WHERE `wcsa_name` = 'WCS' AND `enc` LIKE '%4%';
UPDATE `wcsa` SET `enc` = '8' WHERE `wcsa_name` = 'WCS' AND `enc` LIKE '%8%';
UPDATE `wcsa` SET `enc` = '9' WHERE `wcsa_name` = 'WCS' AND `enc` LIKE '%9%';

-- userpriv
UPDATE `wcsa` SET `userpriv` = '2' WHERE `wcsa_name` = 'WCS' AND `userpriv` LIKE '%2%';
UPDATE `wcsa` SET `userpriv` = '4' WHERE `wcsa_name` = 'WCS' AND `userpriv` LIKE '%4%';
UPDATE `wcsa` SET `userpriv` = '5' WHERE `wcsa_name` = 'WCS' AND `userpriv` LIKE '%5%';
UPDATE `wcsa` SET `userpriv` = '7' WHERE `wcsa_name` = 'WCS' AND `userpriv` LIKE '%7%';
UPDATE `wcsa` SET `userpriv` = '9' WHERE `wcsa_name` = 'WCS' AND `userpriv` LIKE '%9%';
