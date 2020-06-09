using NUnit.Framework;
using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace PSITest_Nemanja
{
    class ProdavacController
    {

        IWebDriver driver;
        String baseUrl = "localhost:8080";

        [SetUp]
        public void Setup()
        {
            driver = new ChromeDriver();
            driver.Manage().Window.Maximize();
            driver.Navigate().GoToUrl(baseUrl + "/Home/goLogin");
            IWebElement email = driver.FindElement(By.Id("email"));
            IWebElement password = driver.FindElement(By.Id("password"));
            IWebElement button = driver.FindElement(By.Name("login"));
            email.SendKeys("dragan@gmail.com");
            password.SendKeys("1234");
            button.Click();
        }

        [Test]
        public void TestIndex()
        {
            IWebElement naslov = driver.FindElement(By.Name("naslov"));
            IWebElement opis = driver.FindElement(By.Name("opis"));
            IWebElement logout;
            IWebElement pocetna;
            IWebElement katalog;
            IWebElement dodavanje;
            IWebElement radnje;
            IWebElement about;


            bool elemtsPresent = true;

            try
            {
                logout = driver.FindElement(By.Name("logout"));
                pocetna = driver.FindElement(By.Name("pocetna"));
                katalog = driver.FindElement(By.Name("katalog"));
                dodavanje = driver.FindElement(By.Name("dodavanje"));
                radnje = driver.FindElement(By.Name("radnje"));
                about = driver.FindElement(By.Name("about"));
            }
            catch (Exception e)
            {
                elemtsPresent = false;
            }

            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac"));
            Assert.IsTrue(naslov.Text.Contains("Dobrodosli u zamak"));
            Assert.IsTrue(opis.Text.Contains("Uzivajte u razledanju naseg \"Dvorca\", nadamo se da cete uz nasu pomoc uspeti da napravite sopstveni dvorac."));
            Assert.IsTrue(elemtsPresent);

        }

        [Test]
        public void TestKatalog()
        {
            IWebElement katalog = driver.FindElement(By.Name("katalog"));
            katalog.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/katalog"));
            Assert.IsTrue(driver.FindElement(By.ClassName("table")).Displayed);
        }

        [Test]
        public void TestDodaj()
        {
            IWebElement katalog = driver.FindElement(By.Name("dodavanje"));
            katalog.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/dodavanje"));
            Assert.IsTrue(driver.FindElement(By.ClassName("table")).Displayed);

            IWebElement kolicina = driver.FindElements(By.Name("kolicina")).First();
            IWebElement button = driver.FindElements(By.Name("promeni")).First();
            kolicina.SendKeys("5");
            button.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/dodavanje"));
            IWebElement trenutnaKolicina = driver.FindElements(By.Name("trenutna_kolicina")).First();
            Assert.IsTrue(trenutnaKolicina.Text.Equals("5"));

            kolicina = driver.FindElements(By.Name("kolicina")).First();
            button = driver.FindElements(By.Name("promeni")).First();
            kolicina.SendKeys("13");
            button.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/dodavanje"));
            trenutnaKolicina = driver.FindElements(By.Name("trenutna_kolicina")).First();
            Assert.IsTrue(trenutnaKolicina.Text.Equals("13"));
        }
        
        [Test]
        public void TestRadnje()
        {
            IWebElement katalog = driver.FindElement(By.Name("radnje"));
            katalog.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/radnje"));

            IWebElement link = driver.FindElement(By.LinkText("Beograd, Milutina Milankovica 21"));
            link.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/radnje/1"));

            link = driver.FindElement(By.LinkText("Beograd, Ustanicka 15"));
            link.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/radnje/2"));

            link = driver.FindElement(By.LinkText("Obrenovac, Vuka Karadzica 99"));
            link.Click();
            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/radnje/3"));
        }

        [Test]
        public void TestAbout()
        {
            IWebElement katalog = driver.FindElement(By.Name("about"));
            katalog.Click();

            IWebElement naslov = driver.FindElement(By.Name("naslov"));
            IWebElement clan1 = driver.FindElement(By.Name("1"));
            IWebElement clan2 = driver.FindElement(By.Name("2"));
            IWebElement clan3 = driver.FindElement(By.Name("3"));

            Assert.IsTrue(driver.Url.Contains(baseUrl + "/Prodavac/about"));
            Assert.IsTrue(naslov.Text.Contains("Nas tim"));
            Assert.IsTrue(clan1.Text.Contains("Nemanja Maksimovic"));
            Assert.IsTrue(clan2.Text.Contains("Petar Kolic"));
            Assert.IsTrue(clan3.Text.Contains("Mina Jankovic"));
        }

        [TearDown]
        public void Close()
        {
            driver.Close();
            driver.Quit();
        }
    }
}
