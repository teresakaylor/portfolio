# 🛠️ Cloud Architecture & Full-Stack Development Portfolio

> **High-Performance WordPress • Hybrid Cloud Infrastructure • AI Data Pipelines**

Welcome to my technical portfolio. This repository serves as a showcase of my work in **System Architecture**, **DevOps**, and **Full-Stack Engineering**.

Unlike standard development, my focus is on building **defensible data assets** and **cost-governed infrastructure** using a hybrid stack of managed Cloud Services (GCP) and self-hosted environments (VPS/CloudPanel).

---

## 📂 Repository Structure

* **[`/case-studies`](./case-studies)**
    * Detailed technical breakdowns of complex server implementations.
    * *Featured:* [Hybrid Cloud Data Architecture (WordPress + PostgreSQL)](https://github.com/teresakaylor/portfolio/blob/main/case-studies/hybrid-cloud-architecture.md))
* **[`/code-samples`](./code-samples)**
    * Sanitized production code demonstrating specific logic (PHP, SQL, Python).
    * *Featured:* Secure GCP Connectivity via PDO.
* **[Possible This](https://github.com/possible-this)**
    * High-level overviews of SaaS and Data products I have engineered.

---

## 🚀 Featured Project: Possible This "Verdict Engine" Architecture

**Role:** Lead Architect & Developer
**Stack:** WordPress (LEMP), Google Cloud SQL (PostgreSQL 16), Varnish, PHP 8.4

**The Challenge:**
A high-volume "Speculative Design" analysis platform required a way to store complex, unstructured AI outputs (JSON logs) that standard MySQL databases could not handle efficiently. The system needed to remain cost-effective while ensuring legal defensibility of the data asset.

**The Solution:**
I engineered a **Hybrid Cloud Bridge**:
1.  **Frontend:** A high-speed WordPress instance on a VPS, optimized with Varnish and Custom LCP logic.
2.  **Backend:** A dedicated **Google Cloud SQL (PostgreSQL)** instance to serve as the "Data Vault."
3.  **The Bridge:** Custom PHP middleware using `pdo_pgsql` to tunnel secure, SSL-encrypted traffic between the host application and the cloud database.

**Key Outcome:**
* **Cost Governance:** Achieved Enterprise-grade data isolation for **<$10/mo** using specialized Micro-tier instances.
* **Performance:** Offloaded write-heavy AI logging to the cloud, preserving frontend speed for users.
* **[Read the Full Technical Case Study Here](https://github.com/teresakaylor/portfolio/blob/main/case-studies/ai-engine-data-persistence-pipeline.md)**

---

## ⚡ Core Competencies

### ☁️ Cloud & Infrastructure
* **Google Cloud Platform (GCP):** Cloud SQL, IAM, VPC Networking.
* **Server Management:** CloudPanel, Docker, Ubuntu CLI, Varnish Cache configuration.
* **Database Administration:** PostgreSQL (JSONB Data Structures), MySQL Optimization.

### 💻 Development
* **Languages:** PHP (8.0+), SQL, JavaScript, Python.
* **WordPress Engineering:** Custom Plugin Development, High-Performance Code Snippets (WPCodeBox), API Integrations.
* **Optimization:** Core Web Vitals (LCP/CLS) tuning, Asset loading strategies.

### 🛡️ Operational Philosophy
1.  **Cost Governance:** Architecting systems that scale without breaking the bank.
2.  **Data Defensibility:** Ensuring data ownership and structure (Schema) support future machine learning needs.
3.  **Non-Destructive Deployment:** Using "Surgical Snippets" and GitHub version control to prevent production downtime.

---

## 📬 Contact

I am available for consulting and architectural reviews.

* **GitHub:** https://github.com/teresakaylor
* **LinkedIn:** www.linkedin.com/in/teresa-kaylor
* **Website:** https://possiblethis.com/github

---
*© 2025 | Built with Markdown & Code*
