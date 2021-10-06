<?php

if($type=='newoption'){
	updateAns($q,$opt);
    echo getAnswered(session()->get('qa'));
}

// if($type=='startexam'){
//     startExam();
// }

if($type=="testing"){
    print_r( session()->get('que') );
}

if($type=="stat"){ $y = session()->get('qa'); ?>

<div class="col-lg-3 col-md-12 col-12">
    <!-- Card -->
    <div class="card mb-4">
        <div class="p-4">
            <span class="fs-6 text-uppercase fw-semi-bold">Total Questions</span>
            <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                <?= examStat($y) ?>
            </h2>

        </div>
    </div>
</div>

<div class="col-lg-3 col-md-12 col-12">
    <!-- Card -->
    <div class="card mb-4">
        <div class="p-4">
            <span class="fs-6 text-uppercase fw-semi-bold">Correct Answers</span>
            <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1 text-success">
                <?= examStat($y, 2) ?>
            </h2>

        </div>
    </div>
</div>
<div class="col-lg-3 col-md-12 col-12">
    <!-- Card -->
    <div class="card mb-4">
        <div class="p-4">
            <span class="fs-6 text-uppercase fw-semi-bold">Wrong Answers</span>
            <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1 text-danger">
                <?= examStat($y, 3) ?>
            </h2>

        </div>
    </div>
</div>
<div class="col-lg-3 col-md-12 col-12">
    <!-- Card -->
    <div class="card mb-4">
        <div class="p-4">
            <span class="fs-6 text-uppercase fw-semi-bold">Your Score</span>
            <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1 text-primary">
                <?= number_format(examStat($y, 4), 1) ?>%
            </h2>

        </div>
    </div>
</div>
<?php }

if($type=='submitexam'){
    function markColor($ca,$op,$a){
        $col='';
    if($op==$a AND $op!=$ca){
        $col = 'text-danger'; }
    elseif($ca==$a){
        $col = 'text-success'; }
        return $col;
    }

    function checked($op,$a){
        return $op==$a ? 'checked' : '';
    }


    function calculateScore($op,$ca){
        return $op==$ca ? 1 : 0 ;
    }

    function option($y,$e,$q,$ca,$op,$a){
        return '<div class="form-check">
        <input type="radio" id="customRadioe5" name="customRadio'.$q.'" class="form-check-input" '.checked($op,$a).' />
            <label class="form-check-label" for="customRadioe5"><span class="h4 '.markColor($ca,$op,$a).'">'.$y[$e][$a].'</span>
            </label>
        </div>';
    }

    $info = session()->get('p_info');

    $y =  session()->get('que'); $m = session()->get('qa');
    $total = count($y);
    $x='';
        $i=0; $sc = 0;
        while($i<$total){ 
            $e=$i++; $ca=$m[$e]['ca'];  $op=$m[$e]['op']; $q=$m[$e]['q']; 

            $x .= '<span style="float:left">Q'.($e+1).'.</span> '.$y[$e]['questions']; 
            $x .= option($y,$e,$q,$ca,$op,'a');
            $x .= option($y,$e,$q,$ca,$op,'b');
            $x .= option($y,$e,$q,$ca,$op,'c');
            $x .= option($y,$e,$q,$ca,$op,'d');
            $x .= '<hr>';

            $sc += calculateScore($op, $ca);

        }
    echo $x;


    $info['total_correct'] = $sc;
}




	
?>
