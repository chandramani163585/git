To verify your SSH connection to GitHub and ensure that your SSH keys are correctly configured, you can use the `ssh -T` command. Here's a step-by-step guide on how to do this:

### Verify SSH Connection to GitHub

#### **Step 1: Open PowerShell or Command Prompt**

- Press `Win + R`, type `powershell`, and press Enter.
- Alternatively, you can open `Command Prompt` by typing `cmd`.

#### **Step 2: Test the SSH Connection for Each Key**

##### **Primary Key (`id_email1`)**

1. **Test the Connection:**

   Run the following command in the terminal:

   ```bash
   ssh -T git@github.com
   ```

   - If you've configured multiple keys using the SSH config file, specify the host alias:

     ```bash
     ssh -T git@github.com-mani1
     ```

2. **Expected Output:**

   You should see a message like this:

   ```plaintext
   Hi <your_username>! You've successfully authenticated, but GitHub does not provide shell access.
   ```

   - If you see this message, it means your SSH key is working correctly for the first account.

##### **Secondary Key (`id_email2`)**

1. **Test the Connection:**

   Run the command using the alias you configured:

   ```bash
   ssh -T git@github.com-mani2
   ```

2. **Expected Output:**

   You should see a similar message:

   ```plaintext
   Hi <your_username>! You've successfully authenticated, but GitHub does not provide shell access.
   ```

   - This confirms that the second SSH key is also correctly set up and working.

#### **Step 3: Troubleshooting**

If you encounter any issues, here are some common problems and solutions:

1. **Permission Denied (Publickey):**

   ```plaintext
   Permission denied (publickey).
   ```

   - **Solution:** Make sure your public key is correctly added to your GitHub account under **Settings** > **SSH and GPG keys**.

2. **Agent Not Running:**

   ```plaintext
   Could not open a connection to your authentication agent.
   ```

   - **Solution:** Ensure the SSH agent is running:

     ```bash
     eval $(ssh-agent -s)
     ```

     Or in PowerShell:

     ```powershell
     Start-Service ssh-agent
     ```

3. **Check SSH Key Files:**

   - Ensure that your SSH key files are named correctly and located in the `.ssh` directory:

     ```bash
     ls ~/.ssh
     ```

   - You should see your keys listed as `id_email1` and `id_email2` along with their `.pub` counterparts.

4. **Correct SSH Config:**

   - Ensure that your SSH `config` file is correctly set up if using multiple keys:

     ```plaintext
     Host github.com-mani1
         HostName github.com
         User git
         IdentityFile ~/.ssh/id_email1

     Host github.com-mani2
         HostName github.com
         User git
         IdentityFile ~/.ssh/id_email2
     ```

   - Make sure there are no typos and the paths to the identity files are correct.

5. **Verify Key Addition:**

   - Make sure your keys are added to the SSH agent:

     ```bash
     ssh-add -l
     ```

   - This should list your SSH keys. If not, add them again:

     ```bash
     ssh-add ~/.ssh/id_email1
     ssh-add ~/.ssh/id_email2
     ```

#### **Step 4: Re-Test Connection**

After troubleshooting, re-run the SSH test commands to verify:

```bash
ssh -T git@github.com-mani1
ssh -T git@github.com-mani2
```

### Conclusion

By following these steps, you can verify that your SSH keys are properly configured and that you can authenticate with GitHub. This ensures secure and seamless interactions with your repositories. If you continue to experience issues, double-check the steps or let me know for further assistance.