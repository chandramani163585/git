## Setting ssh key on  system 

ssh-keygen -t ed25519 -c <youremail>
Example:  ssh-keygen -t ed25519 -c  mani@gmail.com 

$ eval $(ssh-agent -s)					//start the ssh-agent in the background
Example: "eval $(ssh-agent -s)"

~/.ssh/config                           //Enter this command for checking ,  is ssh exists. 
touch ~/.ssh/config                     // create if not exists 

nano ~/.ssh/config             // open file 
        or 
vim ~/.ssh/config 

====================== paste it for multipal start ===========
Host github.com
 HostName github.com  
 user git
 IdentityFile ~/.ssh/id_rsa
 
 #second 
Host github-mani163585 
HostName github.com 
user git
 IdentityFile ~/.ssh/id_rsa_mani163585
 ====================== paste it for multipal end  ===========

 ====================== paste it for single  start ===========
 Host *
 AddKeysToAgent yes
 IdentityFile ~/.ssh/id_ed255519 
 ====================== paste it for single  end  ===========

 ssh-add ~/.ssh/id_ed255519              // Add ssh key 

==> Go to the github and paste your ssh key

cat ~/.ssh/id_ed255519              // copy sshkey through this commad 


##checking ssh connection  
-------------------------  
ssh -T git@github.com 					// If it will return my username then it is working good 
ssh -T git@github-mani163585            //checking connection for second git  


