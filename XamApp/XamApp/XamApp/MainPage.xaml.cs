using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace XamApp
{
    // Learn more about making custom code visible in the Xamarin.Forms previewer
    // by visiting https://aka.ms/xamarinforms-previewer
    [DesignTimeVisible(true)]
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
        }

        private void GetWebTxt(object sender, EventArgs e)
        {
            String url = "https://www.obermeier.ch/xalendar/";

            using (var client = new System.Net.WebClient())
            {
                var reqparm = new System.Collections.Specialized.NameValueCollection()
                {
                    { "msg", "YEETETET" },
                    { "val", "cunt" },
                    { "dic", "succ"}
                };

                client.Headers[System.Net.HttpRequestHeader.ContentType] = "application/x-www-form-urlencoded";
                string responsebody = Encoding.UTF8.GetString(client.UploadValues(url, "POST", reqparm));
                label.Text = responsebody;
            }
        }
    }
}
