/**
This is not a css file, it is a readme outline to help guide what classes exist when desiginng the styleheet to look somewhat like exisint forums.

note: not all classes need to be styled, simpley enough to give all pages a proepr visual layout.

You are free to change any of these hmtl files to allow reuse of css classes.
reusing the same CSS for all pages is advised.

You can use one of the threads on https://us.forums.blizzard.com/en/wow/c/community/
as an example.

The pages that need to be styled are :
threads_main.html
thread.html
new_thread.html


Outline of all classes in html pages:
*/

//this is the page which displays multiple threads.
file: threads_main.html 

//parent class for all threads div
.all-threads

//class for a thread div 
	.main-thread

	//class for a thread title div
	.main-thread-title
	
	//class for div containing a new thread button
	.new-thread-container
	
	//container for buttons to navigate next and prevoiuos main threads pages.
	.thread-navigation-buttons
		
		/**container for previous button, note these buttons should be inline (just change the display:"inline" in css for the buttons or the button container.
		These buttons are also on the thread.html page.
		*/
		.navigation-prev-container
			
			//button for navigation first
			.navigation-first-button
			
			//button for navigation prev
			.navigation-prev-button
			
			//button for navigating next
			.navigation-next-button
			
			//button for navigating last
			.navigation-last-button
			
//this is a page which displays a thread being viewed, the user may respons do the thread with a post.
file: thread.html

//text for title of thread.
.title-text

	//first post in thread
	.first-post, .post
	
	//all proceeding posts in thread
	.post
		
		//container for author
		.author-container
			
			//label for author of post
			.author-label
			
			//text of author of post
			.author-text
		
		//container for post content
		.post-container
			
			//the date the post was made
			.when-posted
			
			//text in post
			.posted-text
		
		
	//new thread file, for posting a new thread.
	file: new_thread.html
	
	//thread container
	.thread
		
		//first and only post on new thread
		.post, .first-post
		
		//author container
		.author-container
		
			//author label
			.author-label
			
			//author text
			.author-text
			
		//container containing post
		.post-container
		
			//content container of post
			.content-container
				
		//post button container
		.post-button-container