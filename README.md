# MJ Associates Website

A professional business website with contact form that sends emails directly.

## Local Setup (Testing)

### 1. Install Node.js
Download from https://nodejs.org (LTS version)

### 2. Install Dependencies
```bash
npm install
```

### 3. Setup Gmail (for email)
- Go to https://myaccount.google.com/apppasswords
- Generate an "App Password" for Gmail
- Copy the 16-character password

### 4. Update .env File
```
EMAIL_USER=mjassociates1992@gmail.com
EMAIL_PASS=your-16-character-app-password
PORT=3000
```

### 5. Run Locally
```bash
npm start
```

Visit: http://localhost:3000

---

## Deploy Live (Cheap Options)

### Option A: Render (RECOMMENDED - $7/month or free)
1. Sign up at https://render.com
2. Connect your GitHub repo
3. Create new Web Service
4. Set environment variables in dashboard:
   - `EMAIL_USER`: mjassociates1992@gmail.com
   - `EMAIL_PASS`: your Gmail app password
5. Deploy automatically from Git

**Cost:** Free tier available, ~$7/month paid

### Option B: Railway ($5 minimum credit)
1. Sign up at https://railway.app
2. Connect GitHub repo
3. Set environment variables
4. Deploy

**Cost:** ~$5/month

### Option C: Heroku Alternative (Replit)
1. Sign up at https://replit.com
2. Import from GitHub
3. Set secrets for EMAIL_USER and EMAIL_PASS
4. Deploy

**Cost:** Free/paid options available

---

## File Structure
```
MJ Associates/
├── index.html          (Website)
├── server.js           (Backend - Node.js/Express)
├── package.json        (Dependencies)
├── .env                (Email credentials - DO NOT COMMIT)
├── .gitignore          (Git ignore rules)
└── README.md           (This file)
```

## Features
✅ No third-party email services  
✅ Direct email to business  
✅ Confirmation email to user  
✅ Form validation  
✅ Mobile responsive  
✅ Easy to deploy  

## Email Requirements
- Uses Gmail SMTP
- Requires Gmail App Password (not regular password)
- Works with other email providers too (configure in server.js)

## Support
For issues with the form, check:
1. .env file has correct Gmail app password
2. Gmail account has 2FA enabled
3. Check server logs for errors
