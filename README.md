# KeyKeep

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Status](https://img.shields.io/badge/status-in%20development-yellow.svg)]()

> A free tool to organize your personal passwords.

**KeyKeep** is a web application for managing personal passwords. The UI is built on top of [Devias' Material Kit React](https://github.com/devias-io/material-kit-react).

## ⚠️ Security Notice

This project is currently **in development and testing**. Its security has not been independently audited, so:

- **Do not** use it to store critical credentials (banking, primary email, etc.).
- Prefer running it in a **local environment** or on **trusted networks**.
- Avoid **exposing the API publicly** until more advanced security testing has been completed.

Beyond building a tool I find useful and sharing it publicly, one of my goals with this project is to use it as a **hands-on playground** to deepen my knowledge of information security.

## 🚀 Quick Start

### Prerequisites

- [Node.js](https://nodejs.org/) (latest LTS version)
- npm or yarn

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/diesousil/keykeep

# 2. Enter the directory
cd keykeep

# 3. Install dependencies
npm install
# or
yarn

# 4. Start the development server
npm run dev
# or
yarn dev

# 5. Open in your browser
# http://localhost:3000