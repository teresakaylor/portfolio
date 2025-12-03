# 🚀 Project: Hybrid AI Verdict Engine & Data Persistence Pipeline

> **Role:** Lead Cloud Architect & Full-Stack Engineer
> 
> **Stack:** PHP 8.4 • PostgreSQL 16 (Google Cloud) • Gemini 2.5 Flash-Lite • WordPress
> 
> **Focus:** Cost Governance, Low-Latency Inference, and Proprietary Data Asset Creation.

---

## 1. Executive Summary
The objective was to build a **Real-Time Speculative Analysis Engine** that classifies user topics based on the "Futures Cone" (Probable, Plausible, Possible).

**The Challenge:**
Standard WordPress databases (MySQL) are ill-suited for storing complex, unstructured AI reasoning logs (JSON). Additionally, relying solely on external APIs (OpenAI/Gemini) for every query is cost-prohibitive and fails to build a defensible data asset.

**The Solution:**
I engineered a **Hybrid Cloud Architecture**:
1.  **The Brain:** Integrating Google's **Gemini 2.5 Flash-Lite** model for high-speed, low-cost inference.
2.  **The Vault:** A dedicated **PostgreSQL** instance on Google Cloud SQL to store "Inflammatory Correlation Index" (ICI) scores using `JSONB` data types.
3.  **The Bridge:** A custom PHP middleware layer that tunnels secure, SSL-encrypted traffic between the application and the cloud database.

---

## 2. Architecture Diagram

```mermaid
graph TD
    User[User Input] -->|AJAX Request| WP[WordPress Application]
    WP -->|1. Check Cache| SQL[(Google Cloud SQL / Postgres)]
    
    subgraph "Logic Layer"
    SQL -- Cache Hit --> WP
    SQL -- Cache Miss --> Gemini[Gemini 2.5 Flash API]
    Gemini -- JSON Verdict --> WP
    WP -- Log Result --> SQL
    end
    
    WP -->|2. Return JSON| Frontend[Custom Terminal UI]
