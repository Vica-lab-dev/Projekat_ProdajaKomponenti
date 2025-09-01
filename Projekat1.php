<?php




    $modelCPU = $_GET["model1"];
    $modelRAM = $_GET["model2"];
    $modelGPU = $_GET["model3"];
    $modelSSD = $_GET["model4"];




    $komponente = [
        "CPU" => [
            "Intel_4-6" => 56, // Nekompatibilan sa DDR%
            "Intel_14" => 101,
            "Ryzen_1000-5000" => 90, // Nekompatibilian sa DDR4
            "Ryzen_7000" => 120
        ],



        "RAM" => [

            "DDR3" => 76,
            "DDR4" => 84,
            "DDR5" => 96
        ],



        "GPU" => [

            "GeForce" => 95,
            "Quadro" => 130,
            "Tesla" => 180,
            "Radeon_Pro" => 180
        ],



        "SSD" => [
            "SATA" => 154,
            "M.2" => 148,
            "NVMe" => 187,
            "U.2" => 176,
        ],
    ];



    if(!array_key_exists($modelCPU, $komponente["CPU"])){
        die ("Model CPU ne postoji.");
    }

    if(!array_key_exists($modelRAM, $komponente["RAM"])){
        die ("Model RAM ne postoji.");
    }

    if(!array_key_exists($modelGPU, $komponente["GPU"])){
        die ("Model GPU ne postoji.");
    }

    if(!array_key_exists($modelSSD, $komponente["SSD"])){
        die ("Model SSD ne postoji.");
    }

    foreach($komponente as $komponenta => $modeli)
    {
        if ($modelCPU == "Intel_4-6" && $modelRAM == "DDR5")
        {
            die ("Model Intel_4-6 i model DDR5 nisu kompatibilni.");
        }


        if ($modelCPU == "Ryzen_1000-5000" && $modelRAM == "DDR4")
        {
            die ("Model Ryzen_1000-5000 i model DDR4 nisu komatibilni");
        }

        if($modelGPU == "Radeon_Pro" && $modelSSD == "M.2"){
            die ("Radeon_Pro i M.2 nisu kompatibilni.");
        }
    }

    $Models = [];
    $ukupnaCena = [];



    if($modelCPU == true){
        array_push($Models, $modelCPU);
        foreach($komponente as $proizvod => $modeli)
        {
            foreach($modeli as $model => $cena)
            {
                if(in_array($model, $Models))
                {
                    array_push($ukupnaCena, $cena);
                }
            }
        }
    }

    if($modelRAM == true){
        array_push($Models, $modelRAM);
        foreach($komponente as $proizvod => $modeli)
        {
            foreach($modeli as $model => $cena)
            {
                if(in_array($model, $Models))
                {
                    array_push($ukupnaCena, $cena);
                }
            }
        }

    }

    if($modelGPU == true){
        array_push($Models, $modelGPU);
        foreach($komponente as $proizvod => $modeli)
        {
            foreach($modeli as $model => $cena)
            {
                if(in_array($model, $Models))
                {
                    array_push($ukupnaCena, $cena);
                }
            }
        }

    }

    if($modelSSD == true)
    {
        array_push($Models, $modelSSD);
        foreach ($komponente as $proizvod => $modeli)
        {
            foreach ($modeli as $model => $cena)
            {
                if(in_array($model, $Models))
                {
                    array_push($ukupnaCena, $cena);
                }
            }
        }

    }



    var_dump(array_unique($ukupnaCena));
    $racun = array_sum(array_unique($ukupnaCena));
    echo "Racun kupljenih komponenata iznosi: $racun e.";