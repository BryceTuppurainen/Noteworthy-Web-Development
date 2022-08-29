<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Styling Guide</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body id="php-styling-guide">
    <header>
        <h1>PHP Styling Guide</h1>
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
    <main>
        <p>Open with <code>&lt;?php</code> followed by a blank line - similarly leave a blank line before closing with <code>?&gt;</code></p>
        <p>Variables are declared using <code>$variable_name = value&semi;</code> and should be in snake_case i.e. lowercase with underscore separation</p>
        <p>Use SCREAMING_SNAKE_CASE for values that should remain constant with <code>define("CONSTANT_NAME", $value)</code> and access them using <code>constant("CONSTANT_NAME")</code></p>
        <p>Use PascalCase for ClassNames</p>
        <p>Use snake_case for property names, typically start with an _ on <code>$_private_properties</code> to make it more obvious to the reader</p>
        <p>Use snake_case for method names, typically start with an _ on <code>_private_methods()</code> to make it more obvious to the reader</p>
        <p>ALWAYS declare visibility (usually <code>public/private</code>) for every property and method in your class, prefer <code>private</code> unless you need external access</p>
        <p>Best practice is generally to start with your public properties, then private, then <code>_construct</code>, then <code>_destruct</code>, public methods, then private methods</p>
        <p>Sadly, there is no overloading in PHP, so make sure that if you make similar functions or classes that they're clearly named, and provide setters so you can declare a class then call all of the setters inline to 'fake' this functionality</p>
        <p>For most control structures (<code>if, while, for, switch,</code> etc.) leave the <code>{</code> on the same line as the statement</p>
        <p>Try to use <code>foreach</code> over <code>for</code> when iterating over arrays unless you have a reason to use a 'regular' for loop</p>
        <p>For functions, methods, and class definitions put <code>{</code> on a new line</p>
        <p>Unless you have a reason to (i.e. a demonstration), usually stick to either just <code>echo</code> or just <code>print</code> for a whole document, I suggest echo to avoid bugs from missing semicolons causing accidental returns</p>
        <!-- TODO(BryceTuppurainen): Add further information and guides here -->
    </main>
</body>

</html>