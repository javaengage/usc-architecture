# Installation
- Run `composer install` to install project dependencies

# Running the application
- From the root directory run `php index.php` from the cli

# Running Test
- From the root directory run `vendor/bin/phpunit App/Tests/ShapeTest.php` from the cli

# Dependencies
- phpunit : For performing unit tests

# Architectural Designs
- An MVC architectural design approach was followed.
- Models are located in the Models folder, Controllers are located in the Controllers folder.
- SOLID principles have been conformed with in the design of the service.
- The `ShapeInterface` declares all the methods necessary for a `Shape` to implement: `draw()` and `calculate()`.
- The `Shape` class is declared as an `abstract` class which `implements` the `ShapeInterface`.
- The `Shape` class is declared has abstract because it is never to be instantiated. It only provides a conceptual representation of a Shape.
- The `Circle` and `Square` concrete classes both `extend` from the `Shape` class, making them both an `instanceOf` `Shape` and `ShapeInterface`.
- They both provide their separate implementation of the `draw()` and 'calculate()' methods declared in the 'ShapeInterface'.
- A `Factory` design pattern is used to create new instances of all kinds of Shapes. This is implemented in the `ShapeFactory` class.
- The `Factory` approach was taken so that there won't be any need to modify the code when new `Shapes` are added to the service.
- The `ShapeResultFormatter` class which implements the `ResultFormatter` interface is solely responsible for formatting the calculations performed on `Shapes` to different formats.

# Adding A New Shape
- Create a new class in the Models/Shapes directory .e.g Triangle.
- Extended the `Shape` class.
- Implement `draw()` and `calculate()` methods
- Add a new element with the new shape's data to the `shapes` array in `index.php` .e.g ['type' => 'triangle' , 'params' =>[]]
- Run the application from the cli `php index.php` and see the output of the new Shape

