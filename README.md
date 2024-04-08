# LeakBook
⚠️This tool was developed for educational purposes only⚠️

This tool is used to take advantage of the default information left in settings.php from [Guestbook](https://www.phpjunkyard.com/php-guestbook-script.php) version 1.9.0.

It operates by basically finding post hash, which is the user's public ip + the 'filter_sum' variable from settings.php hashed with md5 (```md5($_SERVER['REMOTE_ADDR'].$settings['filter_sum']);```).

There are 2 modes:

> 1) Hash finder
> 2) Non-Admin post manager

Mode 1 finds the post's hash

Mode 2 does the same, but prompts you with 'approve/reject' options, that will enable you to either approve or reject your posts, even if you're not the owner of the website.

# What can be done with the hash

The hash can give you the ability of:
> Approving/Rejecting your or someone else's post.
> Viewing your or someone else's post.

To view your posts, all you need to do is use the path ```/apptmp/<your_hash>.txt```. Same goes for viewing other people's posts. 
Generally to manage or view someone else's post, you will need their IP, but that can be done by navigating to ```/entries.txt```, which will give you the details of all the people who signed the guestbook. Who knows, maybe you can view someone's post waiting for approval :P 

# Conclusion

This tool only works if ```$settings['man_approval']``` is set to ```1```.

So if you are the proud owner of a website that uses Guestbook 1.9.0, please update your settings file :3c  
