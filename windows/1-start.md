To configure SSH keys for GitHub on your Windows laptop, follow these steps for both of your emails:

### Step 1: Check for Existing SSH Keys

Before generating new SSH keys, check if you already have existing ones.

1. **Open PowerShell or Command Prompt**:
   - Press `Win + R`, type `powershell`, and press Enter.
   - Alternatively, you can use `cmd`.

2. **List Existing SSH Keys**:
   ```bash
   ls ~/.ssh
   ```

   Look for files named `id_rsa` and `id_rsa.pub` (or similar). If these files exist and you want to use a new key, proceed to generate new keys. Otherwise, you can use the existing ones.

### Step 2: Generate a New SSH Key Pair

1. **Generate SSH Key**:
   For each email, run the following command:

   ```bash
   ssh-keygen -t ed25519 -C "email-1@gmail.com"
   ```

   And for your second email:

   ```bash
   ssh-keygen -t ed25519 -C "email-2@gmail.com"
   ```

   - **-t ed25519** specifies the type of key to create. `ed25519` is recommended, but you can use `rsa` if needed.
   - **-C "your_email@example.com"** is a label for the key.

2. **Save the Key**:
   - When prompted to "Enter a file in which to save the key", you can press Enter to accept the default location (`C:\Users\<YourUserName>\.ssh\id_ed25519`) or specify a different file name (e.g., `id_ed25519_github1` for the first email and `id_ed25519_github2` for the second email).

3. **Set a Passphrase**:
   - Enter a secure passphrase when prompted. This is optional but recommended for added security.

### Step 3: Add the SSH Key to the SSH Agent

1. **Start the SSH Agent**:
   ```bash
   eval $(ssh-agent -s)
   ```

2. **Add Your SSH Key**:
   For each key you created, run:

   ```bash
   ssh-add ~/.ssh/id_ed25519
   ```

   Or the path you specified if you used a custom file name.

### Step 4: Add SSH Key to Your GitHub Account

1. **Copy the SSH Key**:
   - Use the following command to copy the key to your clipboard:

     ```bash
     cat ~/.ssh/id_ed25519.pub | clip
     ```

     Or if you named it differently:

     ```bash
     cat ~/.ssh/id_ed25519_github1.pub | clip
     ```

2. **Add the Key to GitHub**:
   - Log in to your GitHub account.
   - Go to **Settings** > **SSH and GPG keys** > **New SSH key**.
   - Paste the copied key into the "Key" field.
   - Give it a descriptive title (e.g., "Personal Laptop - email-1@gmail.com").
   - Click **Add SSH key**.

   Repeat the process for your second email.

### Step 5: Configure Git for Each Email

1. **Set Global Username and Email**:
   You can set global Git settings with your primary email:

   ```bash
   git config --global user.name "Your Name"
   git config --global user.email "email-1@gmail.com"
   ```

2. **Set Local Email for Specific Repositories**:
   If you want to use a different email for specific repositories, navigate to the repository directory and run:

   ```bash
   git config user.email "email-2@gmail.com"
   ```

### Step 6: Test Your SSH Connection

To verify that your SSH key is correctly set up, test the connection:

```bash
ssh -T git@github.com
```

If everything is set up correctly, you should see a message like:

```plaintext
Hi <username>! You've successfully authenticated, but GitHub does not provide shell access.
```

### Troubleshooting Tips

- **Permission Denied**: If you encounter a "Permission denied" error, ensure that your SSH key is added to the SSH agent and correctly linked to your GitHub account.
  
- **Passphrase**: If you set a passphrase for your SSH key, you'll need to enter it whenever you use the key.

