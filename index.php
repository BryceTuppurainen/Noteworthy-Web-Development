<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Cheatsheet</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>

    <header>
        <h1>PHP Cheatsheet</h1>
        <hr />
    </header>
    <nav>
        <ul>
            <li>
                <a href="./index.php">Home</a>
            </li>
            <li>
                <a href="./php-styling-guide.php">PHP Styling Guide</a>
            </li>
        </ul>
    </nav>

    <?php

    # This is a comment

    // This is also a comment in a single line - my preferred style

    /*
    * This is a multi-line comment
    */

    /**
     * This is a docblock - try highlighting the my_function in an IDE
     */
    function my_function($x)
    {
        return "Demonstration of a Docblock";
    };

    /* 
    * whether_to_use_snake_case, PascalCase, or camelCase is a matter of preference,
    * HOWEVER be consistent, personally, to keep it simple, always use snake_case 
    * except for class names which should be PascalCase
    */

    // Use define("CONSTANT_NAME", value) to define constants, then constant("CONSTANT_NAME") to access them
    define("MY_PI_CONSTANT", 3.14159);

    echo "My Pi Constant: " . constant("MY_PI_CONSTANT") . "<br />";

    // Basic Data-Types and variables (note how variables are declared without a type, they're weakly typed and can be reassigned to any type, this should be really scary to a developer...)

    // Strings are a collection of characters, but in PHP a single character is also considered to be a string (see below)

    $string = "Hello World";

    // This is also a 'string' (but of length 1)
    $char = 'c';

    $integer = 123;
    $float = 1.23;
    $boolean = true;


    $array = array("Hello", "World");
    $object = new stdClass(); // PHP from 7.3 supports garbage collection, so you don't need to deallocate resources using new
    $null = null;

    // Operators

    // Arithmetic and Concatenation

    $sum = 1 + 1; // 2
    $difference = 1 - 1; // 0
    $product = 2 * 2; // 4
    $quotient = 2 / 1; // 2
    $exponent = 2 ** 4; // 16
    $modulus = 5 % 2; // 1
    $concat = "Hello" . " " . "World"; // "Hello World" - You can use this to concatenate strings or values that can be implicitly converted into strings

    // Note that many shorthand operators exist such as +=, -= or .= these are usually called assignment operators

    // Comparisons

    $equal = 1 == "1"; // true
    $identical = 1 === "1"; // false - identical infers no implicit conversions for comparison, i.e. both sides must ALSO be the same data type
    $not_equal = 1 != 1; // false
    $not_identical = 1 !== 1; // false
    $less_than = 1 < 2; // true
    $greater_than = 1 > 2; // false
    $less_than_or_equal_to = 1 <= 1; // true
    $greater_than_or_equal_to = 1 >= 2; // false
    $spaceship = 1 <=> 2; // -1 (returns -1 on less than, 0 on equal to, and 1 on greater than) - please avoid using this shorthand, it tends to lead to bugs

    // Increment and Decrement

    $i = 1;
    $i++; // 1 (post-increment i.e. this line returns the value of i before incrementing it to 2)
    ++$i; // 2 (pre-increment i.e. this line increments i before returning the value so you can use $x = ++$i; to increment i and assign the incremented value to $x at the same time)
    $i--; // 1 (post-decrement)
    --$i; // 0 (pre-decrement)

    // Logical

    $and = true && true; // true - you can also use the word 'and' instead of &&
    $or = true || false; // true - you can also use the word 'or' instead of ||
    $xor = true xor false; // true
    $not = !true; // false

    // Ternary Conditional Assignments work in PHP as well - i.e. if the value before the ? is true then the value before the : is used

    $ternary = true ? "Hello" : "World"; // "Hello" - Because the value before the ? was true

    // Basic Control Flows

    $x = 5;
    if ($x < 5) {
        // Not executed
    } else if ($x > 5) {
        // Not executed
    } else {
        // Executed
    }

    // print and echo are the same in PHP in terms of what they do, but print actually returns a value of 1 while echo does not

    print "<ul>";
    $a = 0;
    while ($a <= 10) {
        print "<li>A = " . $a . "</li>";
        $a += 1;
    }
    print "</ul>";

    // The for loop is the same syntax as C/C++/Java/JavaScript/etc.
    print "<ul>";
    for ($i = 0; $i <= 10; $i++) {
        echo "<li>I = " . $i . "</li>";
    }
    print "</ul>";

    // The foreach loop is used to iterate over arrays
    $array = array("Hello", "World");
    foreach ($array as $value) {
        echo $value . " ";
    }
    echo "<br>";

    // Switch is also a common control flow structure
    $variable = "example";
    switch ($variable) {
        case 'example': // Note the use of '' is redundant
            // Executed

        case 'careful to use breaks properly':
            // Executed
            break;

        default:
            // Not executed
            break;
    }

    // try-catch-finally blocks are used for error handling similarly to JavaScript
    try {
        throw new Exception("This is an exception");
    } catch (Exception $e) {
        echo $e->getMessage() . "<br>";
    } finally {
        // Executed last regardless of whether an exception was thrown - useful for closing resources...
        echo "Notice how this is executed last" . "<br>";
    }

    // Functions

    // Notice how you can call defined functions before they're actually defined - although typically avoid this practice as it is generally considered less readable
    print my_other_function("Hello World") . "<br>";

    // PHP functions are first-class and can only be defined once within a scope, so I cannot call this my_function because of the one defined at the top in the same scope
    function my_other_function($example_parameter)
    {
        return "The parameter passed to my_other_function was " . $example_parameter;
    };

    // Functions can also be defined as anonymous functions (i.e. without a name) and assigned to 'variables' yes this also means you can curry functions, return functions, or declare callbacks, etc.
    $anonymous_function = function ($x) {
        return "The parameter passed to the anonymous function was " . $x;
    };

    print $anonymous_function("Hello World") . "<br>";

    // The final little functions trick you should be aware of is recursion - i.e. a function calling itself - factorial is the classic example i.e. 1 x 2 x 3 x 4 x ... x n = n!
    function factorial($n)
    {
        if ($n <= 1) {
            return 1;
        } else {
            return $n * factorial($n - 1);
        }
    }

    print "5! = " . factorial(5) . "<br>";

    // Classes

    // Notice that you can call the class before it is actually defined in your code
    $example = new MyClass();

    class MyClass
    {
        // Properties
        public $property = "Publicly accessible property";
        public static $static_property = "Static Property - this is shared across all instances of MyClass";
        private $_private_property;

        // Constructor - You can also add parameters to the constructor, but typically the practice is to use setters to set the properties of the class immediately after instantiation
        public function __construct()
        {
            // Executed when the class is instantiated, note the leading dunderscore
            $this->_private_property = "Personally I suggest using _ leading private properties for readability";
            echo "MyClass Constructor called<br>";
        }

        // Methods
        public function my_method()
        {
            return "Method Call using private property " . $this->_private_property;
        }

        public static function my_static_method()
        {
            return "Static method independent of class instance";
        }

        public function __destruct()
        {
            // Executed when the class is destroyed - i.e. falls out of scope or this is called, note the leading dunderscore
            echo "MyClass Destructor called<br>";
        }
    }


    $my_class = new MyClass(); // Note how the __construct method gets called

    // Notice how the static property is shared across all instances of MyClass and called using :: and the ClassName rather than the arrow operator
    print $my_class->property . "<br>";
    print $my_class->my_method() . "<br>";
    print MyClass::$static_property . "<br>";
    print MyClass::my_static_method() . "<br>";

    print "Notice how the __destruct method gets called only when the class instance falls out of scope right at the end of the document and once for each instantiated class<br>";

    // I've intentionally avoided Globals (including the global keyword), Static, and Super Globals - but you can find out more about them here: https://www.php.net/manual/en/language.variables.superglobals.php
    // We'll likely go more into detail about these in another session, for now, just know that they exist and are used for various things such as $_GET["key"], $_POST["key"] to
    // grab values from the URL request respectively, as well as $_SESSION["key"] to store values in the session, etc.

    // I also have skipped over reading data from files such as XML and JSON, but you can find out more about that here: https://www.php.net/manual/en/book.simplexml.php

    ?>
    <h1>Notice how easily this integrates into the HTML</h1>

    <?php

    echo "<h3>Written by Bryce Tuppurainen</h3>";

    ?>

</body>

</html>