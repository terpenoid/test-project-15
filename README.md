# test-project-15

An example of applying the filter chain to payment methods.

Can be run by command line:

``php console.php <path to requests json file> <path to methods json file> <path to filters json file>``

(there are several data examples in the `data`-dir)

Example:

``php console.php data/request.json data/methods.json data/filters_and.json``

Or you can use Docker PHP image if you don't have installed PHP:

``docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:7.4-cli php console.php data/request.json data/methods.json data/filters_and.json``
