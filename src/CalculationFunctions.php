<?php

class CalculationFunctions

{
    //    Konstanty
    private const VALUE_INFO = 'INFO';
    private const VALUE_LOW = 'LOW';
    private const VALUE_MEDIUM = 'MEDIUM';
    private const VALUE_HIGH = 'HIGH';
    private const VALUE_CRITICAL = 'CRITICAL';

    public static function calculateRiskLevel($likvalue, $impvalue) {

        //vypocet rizik

        if($likvalue < 3) {
            $liklevel = self::VALUE_LOW;
        } elseif ($likvalue < 6) {
            $liklevel = self::VALUE_MEDIUM;
        } elseif($likvalue <= 9) {
            $liklevel = self::VALUE_HIGH;
        };


        if($impvalue < 3) {
            $implevel = self::VALUE_LOW;
        } elseif ($impvalue < 6) {
            $implevel = self::VALUE_MEDIUM;
        } elseif($impvalue <= 9) {
            $implevel = self::VALUE_HIGH;
        };


        //INFO
        if($liklevel == self::VALUE_LOW && $implevel == self::VALUE_LOW) $risklevel = self::VALUE_INFO;

        //LOW
        if($liklevel == self::VALUE_LOW && $implevel == self::VALUE_MEDIUM) $risklevel = self::VALUE_LOW;
        if($liklevel == self::VALUE_MEDIUM && $implevel == self::VALUE_LOW) $risklevel = self::VALUE_LOW;

        //MEDIUM
        if($liklevel == self::VALUE_LOW && $implevel == self::VALUE_HIGH) $risklevel = self::VALUE_MEDIUM;
        if($liklevel == self::VALUE_MEDIUM && $implevel == self::VALUE_MEDIUM) $risklevel = self::VALUE_MEDIUM;
        if($liklevel == self::VALUE_HIGH && $implevel == self::VALUE_LOW) $risklevel = self::VALUE_MEDIUM;

        //HIGH
        if($liklevel == self::VALUE_HIGH && $implevel == self::VALUE_MEDIUM) $risklevel = self::VALUE_HIGH;
        if($liklevel == self::VALUE_MEDIUM && $implevel == self::VALUE_HIGH) $risklevel = self::VALUE_HIGH;

        //CRITICAL
        if($liklevel == self::VALUE_HIGH && $implevel == self::VALUE_HIGH) $risklevel = self::VALUE_CRITICAL;


        return [$liklevel, $implevel, $risklevel];

    }

    public static function calculateAverage($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8) {
//        var_dump($p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8);
        return ($p1+$p2+$p3+$p4+$p5+$p6+$p7+$p8)/8;
    }

    
//    farbicky
    public static function getRiskColour($value) {
        if($value == "CRITICAL") return 'text-danger';
        if($value == "HIGH") return 'text-warning';
        if($value == "MEDIUM") return 'text-primary';
        if($value == "LOW") return 'text-success';
        if($value == "INFO") return 'text-dark';
    }

//    preklady do anglictiny :)
    public static function getTranslatedName($riskvalue) {
        if($riskvalue == self::VALUE_CRITICAL) return 'CRITICAL';
        if($riskvalue == self::VALUE_HIGH) return 'HIGH';
        if($riskvalue == self::VALUE_MEDIUM) return 'MEDIUM';
        if($riskvalue == self::VALUE_LOW) return 'LOW';
        if($riskvalue == self::VALUE_INFO) return 'INFO';
    }


}