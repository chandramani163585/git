Great! Now that you have generated your SSH keys (`id_email1` and `id_email2`), you can proceed to set them up for GitHub. Below are the detailed steps to configure and use these keys.

### Step-by-Step Guide to Configure SSH Keys for GitHub

---

### **Step 1: Add SSH Keys to the SSH Agent**

You need to add your newly generated SSH keys to the SSH agent, which will help manage your SSH keys for you.

1. **Open PowerShell or Command Prompt**:

   Press `Win + R`, type `powershell`, and press Enter.

2. **Start the SSH Agent**:

   Run the following command to ensure the SSH agent is running:

   ```bash
   eval $(ssh-agent -s)
   ```

   If you're using PowerShell, the command would be:

   ```powershell
   Start-Service ssh-agent
   ```

3. **Add SSH Keys to the SSH Agent**:

   For each key, run the following commands:

   ```bash
   ssh-add ~/.ssh/id_email1
   ssh-add ~/.ssh/id_email2
   ```

   If your keys are located in a different directory, make sure to use the correct path.

---

### **Step 2: Add SSH Keys to Your GitHub Account**

You must add each SSH public key to your respective GitHub account.

1. **Copy the SSH Key to Clipboard**:

   Use the following command to copy your first key to the clipboard:

   ```bash
   cat ~/.ssh/id_email1.pub | clip
   ```

   And for the second key:

   ```bash
   cat ~/.ssh/id_email2.pub | clip
   ```

2. **Add the Key to GitHub**:

   - **Log in to GitHub**:
     - Visit [GitHub](https://github.com/) and sign in with your account credentials.

   - **Go to Settings**:
     - Click on your profile picture in the top-right corner and select **Settings**.

   - **Access SSH and GPG Keys**:
     - On the left sidebar, click **SSH and GPG keys**.

   - **Add New SSH Key**:
     - Click the **New SSH key** button.
     - **Title**: Provide a descriptive name for the key (e.g., "Laptop - email-1@gmail.com").
     - **Key**: Paste the copied SSH key into the "Key" field.
     - Click **Add SSH key** to save.

3. **Repeat for the Second Key**:

   Follow the same steps to add the second key for your other email:

   - Copy the key using `cat ~/.ssh/id_email2.pub | clip`.
   - Add it as a new SSH key in your GitHub settings.

---

### **Step 3: Configure Git for Each Email**

You need to configure Git to use the correct email for your repositories.

1. **Global Configuration for Primary Email**:

   If `email-1@gmail.com` is your primary email, set it as the global configuration:

   ```bash
   git config --global user.name "Your Name"
   git config --global user.email "email-1@gmail.com"
   ```

2. **Local Configuration for Specific Repositories**:

   For repositories where you want to use your secondary email (`email-2@gmail.com`), configure the email locally:

   - **Navigate to the Repository**:

     ```bash
     cd path/to/your/repo
     ```

   - **Set Local Email**:

     ```bash
     git config user.email "email-2@gmail.com"
     ```

   This setting will apply only to the repository you are currently in.

---

### **Step 4: Test Your SSH Connection**

To ensure everything is set up correctly, you can test your SSH connection to GitHub.

1. **Test Connection for Primary Key**:

   ```bash
   ssh -T git@github.com
   ```

   You should see a message like:

   ```plaintext
   Hi <username>! You've successfully authenticated, but GitHub does not provide shell access.
   ```

2. **Test Connection for Secondary Key**:

   If you want to test connections for both keys, you can create a SSH configuration file to specify which key to use for GitHub.

---

### **Step 5: Create a SSH Config File (Optional for Multiple Keys)**

If you use multiple keys for different GitHub accounts, you can create a `config` file to manage them.

1. **Create/Edit the SSH Config File**:

   Open your SSH configuration file in a text editor:

   ```bash
   code ~/.ssh/config
   ```

   If you don't have a text editor command like `code`, you can use:

   ```bash
   notepad ~/.ssh/config
   ```

2. **Add Configuration for Each Key**:

   Paste the following configuration into the file:

   ```plaintext
   # For email-1@gmail.com
   Host github.com-mani1
       HostName github.com
       User git
       IdentityFile ~/.ssh/id_email1

   # For email-2@gmail.com
   Host github.com-mani2
       HostName github.com
       User git
       IdentityFile ~/.ssh/id_email2
   ```

3. **Clone Repositories Using Configured Hosts**:

   When cloning a repository, use the configured hosts:

   - For the first account:

     ```bash
     git clone git@github.com-mani1:username/repo.git
     ```

   - For the second account:

     ```bash
     git clone git@github.com-mani2:username/repo.git
     ```

   Replace `username` and `repo` with your GitHub username and repository name.

---

### Conclusion

You have successfully configured SSH keys for both of your GitHub accounts on your Windows laptop. By following these steps, you can manage multiple GitHub accounts and ensure secure communication with GitHub using SSH.

If you have any issues or need further assistance, feel free to ask!