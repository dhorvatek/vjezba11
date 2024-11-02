<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime numbers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Check if the number is prime</h2>
    <form method="post">
        <label for="number">Enter your number:</label><br>
        <input type="number" id="number" name="number" required><br><br>
        <button type="submit">Check</button>
    </form>

    <?php
    //prime func
    function isPrime($num) {
        if ($num <= 1) return false;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = (int)$_POST['number'];
        $isPrimeResult = isPrime($number);
        
        if ($isPrimeResult) {
            echo "<h3>$number is prime.</h3>";
        } else {
            echo "<h3>$number is not prime.</h3>";
        }
    }

    //fill array with prime num (prime func to check if the number is prime)
    $primes = [];
    $i = 2;
    while ($i < 100) {
        if (isPrime($i)) {
            $primes[] = $i;
        }
        $i++;
    }
    ?>

    <div style="margin-top: 20px;">
        <h4>Prime numbers from 0 to 100:</h4>
        <p>
            <?php
            for ($j = 0; $j < count($primes); $j++) {
                echo $primes[$j];
                echo ", ";
            }
            ?>
        </p>
    </div>
</body>
</html>
