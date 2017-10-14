<?php
/**
 * @package The_Force
 * @version 1.3
 */
/*
Plugin Name: The Force
Plugin URI: http://www.RohitMotwani.com/
Description: This Plugin is Just Similar to the WordPress' Famous <cite>Hello Dolly</cite> Plugin. Except when activated you will randomly see a quote from The Star Wars Series in the upper right of your admin screen on every page.
Author: Rohit Motwani
Version: 1.3
Author URI: http://www.RohitMotwani.com/
*/

function the_force_get_quotes() {
	/** These are the quotes of Star Wars */
	$quotes = "May the force be with you.
The Force is strong in my family.
My father has it.
I have it.
My sister has it.
You have that power too.
I find your lack of faith disturbing.
The Jedi you are.
Don't underestimate the power of the Dark Side.
The Force is strong with you.
Hmm! Adventure. Hmmpf! Excitement. A Jedi craves not these things.
Hey R2, what do you think ?
Peeeeee poooo peeee peeee peee pooooo tuiiiiiiiiii.
AAAAAAAhhhhhhhhhhhhh AAAAAAAAhhhhhhhhhhhhhhhhh -Chewbacca.
Good relations with Wookies I have.
I've got a bad feeling about this.
Now, witness the power of fully operational battle station.
Light it up, fuzzball!
Search your feelings.
I'm a Jedi, as my father before me.
Only at the end do you realize the power of the Dark Side.
IT'S A TRAP!
Give yourself to the Dark Side.
Luminous being are we, not this crude matter.
There's been an awakening in the Force. Have you felt it ?
Your eyes can deceive you. Don't trust them.
Do. Or do not. There is no try.
Your focus determines your reality.
So this is how liberty dies... with thunderous applause.
Never tell me the odds.
This is a new day, a new beginning.
It's true. All of it. The Dark Side, the Jedi. They're real.
Nothing will stand in our way... I will finish what you started.
The Force, it's calling to you. Just let it in.
Hope is not lost today... it is found.
I was raised to do one thing... but I've got nothing to fight for.
I'm no one. - Rey
I have lived long enough to see the same eyes in different people. I see your eyes... I know your eyes!
So, who talks first? Do you talk first? - Poe
I know all about waiting. For my family. They’ll be back. Some day.
I am with the Resistance. This is what we look like. Some of us look different.
That one’s garbage! Garbage Will Do.!
It’s true. All of it. The Dark Side. The Jedi. They’re real.
Luke is a Jedi. You’re his father.
You will remove these restraints and leave this cell with the door open.
That’s not how The Force works!
I’m being torn apart. I want to be free of this pain.
Chewie, we're Home";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function the_force() {
	$chosen = the_force_get_quotes();
	echo "<p id='force'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'the_force' );

// We need some CSS to position the paragraph
function force_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#force {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 12px;
	}
	</style>
	";
}

add_action( 'admin_head', 'force_css' );

?>
