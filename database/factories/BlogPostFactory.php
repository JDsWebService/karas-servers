<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $body = "<p>Bacon ipsum dolor amet turkey frankfurter minim culpa beef porchetta sint exercitation consequat magna aliqua jerky ullamco non. Eiusmod et dolor rump chuck. Eiusmod tri-tip exercitation, rump ground round officia ham hock voluptate swine pork meatball boudin laborum anim. Boudin meatloaf strip steak chuck, pig voluptate landjaeger laborum cupim pork belly commodo nostrud aliqua pork chop drumstick. Elit cow venison pork chop velit hamburger, beef eiusmod. Beef officia pork loin, porchetta brisket lorem ball tip boudin deserunt pancetta. Andouille prosciutto cupim bresaola, est nostrud leberkas.</p><p>In reprehenderit do eu pork loin. Minim incididunt beef ribs turducken. Meatball meatloaf ipsum, qui ut landjaeger pastrami irure cow. Veniam in dolore boudin, laborum ut hamburger. Jowl ut pork loin ex elit anim, shoulder velit filet mignon nostrud minim beef. Ball tip tri-tip doner eu drumstick, elit capicola tail in consequat. Boudin shank pancetta excepteur veniam landjaeger, dolor ex cupim.</p><p>Tri-tip pancetta t-bone, ham hock velit non ut officia short loin boudin anim. Ad pig voluptate cow tail chislic rump landjaeger qui nisi picanha kevin jerky eu et. Shoulder tempor ut, reprehenderit ball tip mollit leberkas shank rump. Lorem ball tip swine anim, shankle labore chicken. Andouille capicola dolore, pig chicken aliqua sirloin aute fugiat mollit ham hock deserunt.</p><p>Pork chop buffalo pig, kevin shank chislic kielbasa aute officia exercitation cupim magna ex. Cow occaecat pork belly chislic ham mollit cupidatat shank sirloin frankfurter. Laboris brisket cupidatat, sint beef ribs cow consectetur pig shank lorem ad mollit veniam ex fugiat. T-bone turkey pig, chislic nulla exercitation ullamco consequat shoulder consectetur adipisicing ex ham biltong.</p><p>Pastrami turducken qui, filet mignon short loin ea elit tempor eiusmod ham hock kielbasa id flank in voluptate. Exercitation hamburger voluptate fugiat et leberkas, ullamco tri-tip porchetta. Laboris laborum salami do tenderloin in ribeye meatball. Magna chicken brisket prosciutto. Laboris veniam in shankle excepteur turkey, filet mignon kielbasa pork nostrud quis.</p>";
    return [
        'title' => $faker->sentence(3),
        'slug' => $faker->unique()->slug,
        'image' => $faker->imageUrl(800,400,'cats'),
        'body' => $body,
        'user_id' => $faker->numberBetween(1,10)
    ];
});
